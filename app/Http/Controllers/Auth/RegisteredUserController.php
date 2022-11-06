<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Canva;
use App\Models\Corcel\WpUser;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use App\Providers\RouteServiceProvider;
use App\Rules\GoogleCaptcha;
use Corcel\Services\PasswordService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries  = Country::get();
        if (!request()->step || request()->step == 1) {
            return view("frontend.auth.register.index-1-0", compact("countries"));
        }
        // return view('frontend.auth.register.index', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ["nullable", 'string', 'max:50'],
            'country' => ['required', 'string', 'max:30'],
            "canva" => ["required", "in:yes,no"],
            "personal_detail" => ["required_if:canva,yes"],
            "canva_free" => ["required_if:canva,yes"],
            'role' => ['required', 'string', 'max:30', Rule::in(['student-above', 'student-below', 'parent', 'teacher'])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'unique:App\Models\Corcel\WpUser,user_email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ["accepted"],
            "date_of_birth" => ["required", "date", "date_format:Y-m-d"],
            "recaptcha_token" => ["required", new GoogleCaptcha()]

        ]);
        $wp_level = [
            "student-above" => "{s:15:\"student-over-18\";b:1;}",
            "parent" => "{s:18:\"parents-of-student\";b:1;}",
            "student-below" => "{s:16:\"student-under-18\";b:1;}",
            "teacher" => "{s:14:\"school-teacher\";b:1;}"
        ];
        $wp_user = new WpUser;
        $password_hash = new PasswordService;
        $wp_user->user_login = Str::random(8);
        $wp_user->user_pass = $password_hash->makeHash($request->password);
        $wp_user->user_nicename = $request->first_name;
        $wp_user->user_email = $request->email;
        $wp_user->display_name = $request->first_name . " " . $request->last_name;

        $user_meta = [
            "nickname" => Str::lower($request->first_name),
            "first_name" => Str::ucfirst($request->first_name),
            "last_name" => $request->last_name,
            "wp_capabilities" => "a:1:" . $wp_level[$request->role],
            "wp_user_level" => 0,

        ];


        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country = Country::find($request->country)->name;
        $user->role = Role::where('slug', Str::replace("-", '_', $request->role))->first()->id;
        $user->source = "signup";
        $user->gender = "male";
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;

        if (session()->has('source')) {
            $user->source = session()->get('source');
        }
        if (session()->has('user_detail')) {

            $user->first_name = session()->get("user_detail")["first_name"];
            $user->last_name = session()->get("user_detail")["last_name"];
            $user->email = session()->get("user_detail")["email"];
            $user->password = Hash::make(Str::random("8"));
            $user->source_id = session()->get('user_detail')["uid"];
            $wp_user->user_pass = $password_hash->makeHash(Str::random(12));

            if (isset(session()->get('user_detail')["avatar"])) {
                $user->avatar = ["original_filename" => session()->get('user_detail')["avatar"], "path" => session()->get('user_detail')["avatar"]];
            }
            $user->status = "active";
        } else {
            $user->password = Hash::make($request->password);
        }
        $user->username = Str::random(8);

        $canva = null;
        if ($request->canva == "yes") {
            $canva = new Canva;
            $canva->email = $user->email;
            $canva->full_name = $request->first_name . (($request->middle_name) ? $request->middle_name . " " : " ") . $request->last_name;
        }

        try {
            //code...
            DB::transaction(function () use ($request, $user, $canva, $wp_user, $user_meta) {
                $user->save();

                if ($canva) {
                    $canva->save();
                }
                $user_meta["wp_source"] = $user->source;
                $wp_user->save();
                $wp_user->saveMeta($user_meta);
            });
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to register your account at the moment. Please try again later.");
            return back()->withInput();
        }
        if ($user->source  != "signup") {
            session()->forget(["source", "user_detail"]);
            $encrypt = ($wp_user->ID);
            $csrf = csrf_token();
            return redirect()->to("https://upschool.co/?_ref=r_app&_ref_id=" . $encrypt . "&_token=" . $csrf);
            return redirect()->route('frontend.user.registration.verification.message.facebook');
        }
        event(new Registered($user));
        return redirect()->route('frontend.user.registration.verification.message');
    }

    public function facebookCreate()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback()
    {
        $password  = Str::random();
        $fb_user = Socialite::driver("facebook")->user();

        // check if this email is already used or not .
        $db_user = User::where('email', $fb_user->email)->first();
        $wp_user_detai = WpUser::where('user_email', $fb_user->email)->first();

        if (!$db_user && !$wp_user_detai) {
            // $countries  = Country::cursor();
            $seperate_name = explode(" ", $fb_user->name);
            $first_name = $seperate_name[0];
            $last_name = isset($seperate_name[1]) ? $seperate_name[1] : "Not available";
            $user_detail = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $fb_user->email,
                "uid" => $fb_user->id,
                "password" => $password,
                "password_confirmation" => $password
            ];

            session()->put("source", 'facebook');
            session()->put("user_detail", $user_detail);
            return redirect()->route('google-register-signup-contd');

            // return view("frontend.auth.social.facebook", compact("countries", "user_detail"));
        }

        if ($wp_user_detai) {
            $encrypt = ($wp_user_detai->ID);
            $csrf = csrf_token();
            return redirect()->to("https://upschool.co/?_ref=r_app&_ref_id=" . $encrypt . "&_token=" . $csrf);
        }
        session()->flash("error", "Unable to provide service to your account.");
        return redirect()->route('register');
        return redirect(RouteServiceProvider::HOME);
    }

    public function googleCreate()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $g_user = Socialite::driver("google")->user();
        $db_user = User::where('source', 'google')->where('source_id', $g_user->user["id"])->where('status', 'active')->first();
        $wp_user_detai = WpUser::where('user_email', $g_user->user["email"])->first();

        $password  = Str::random();
        if (!$db_user && !$wp_user_detai) {
            $user_detail = [
                "first_name" => $g_user->user["given_name"],
                "last_name" => isset($g_user->user["family_name"]) ? $g_user->user["family_name"] : "not available",
                "email" => $g_user->user["email"],
                "uid" => $g_user->user["id"],
                "password" => $password,
                "avatar" => $g_user->user["picture"],
                "password_confirmation" => $password
            ];
            session()->put("source", 'google');
            session()->put("user_detail", $user_detail);
            return redirect()->route('google-register-signup-contd');
        }

        if ($wp_user_detai) {
            $encrypt = ($wp_user_detai->ID);
            $csrf = csrf_token();
            return redirect()->to("https://upschool.co/?_ref=r_app&_ref_id=" . $encrypt . "&_token=" . $csrf);
        }

        session()->flash("error", "Unable to provide service to your account.");
        return redirect()->route('register');
        // die();
        // return redirect()->to("https://upschool.co/?_ref=r_app&_ref_id=" . $encrypt . "&_token=" . $csrf);

        // Auth::login($db_user, true);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function googleForm()
    {
        $countries  = Country::cursor();
        $user_detail = session()->get("user_detail");
        return view("frontend.auth.social.facebook", compact("countries", "user_detail"));
    }

    public function emailCheck(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users|unique:App\Models\Corcel\WpUser,user_email"
        ]);
    }
}
