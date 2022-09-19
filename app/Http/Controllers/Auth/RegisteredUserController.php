<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Canva;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use App\Providers\RouteServiceProvider;
use App\Rules\GoogleCaptcha;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ["accepted"],
            "date_of_birth" => ["required", "date", "date_format:Y-m-d"],
            // "recaptcha_token" => ["required", new GoogleCaptcha()]

        ]);
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

            if (isset(session()->get('user_detail')["avatar"])) {
                $user->avatar = ["original_filename" => session()->get('user_detail')["avatar"], "path" => session()->get('user_detail')["avatar"]];
            }
            $user->status = "active";
        } else {
            $user->password = Hash::make($request->password);
        }
        $user->username = Str::random(8);

        // $user = [
        //     "first_name" => $request->first_name,
        //     "last_name" => $request->last_name,
        //     "country" => Country::find($request->country)->name,
        //     "role" => Role::where('slug', Str::replace('-', '_', $request->role))->first()->id,
        //     "source" => "signup",
        //     "username" => Str::random(8),
        //     "password" => Hash::make($request->password),
        //     "gender" => "male"
        // ];
        $canva = null;
        if ($request->canva == "yes") {
            $canva = new Canva;
            $canva->email = $user->email;
            $canva->full_name = $request->first_name . (($request->middle_name) ? $request->middle_name . " " : " ") . $request->last_name;
        }

        try {
            //code...
            DB::transaction(function () use ($request, $user, $canva) {
                $user->save();

                if ($canva) {
                    $canva->save();
                }
            });
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Unable to register your account at the moment. Please try again later.");
            return back()->withInput();
        }
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // event(new Registered($user));
        // Auth::login($user);
        if ($user->source  != "signup") {
            session()->forget(["source", "user_detail"]);
            return redirect()->route('frontend.user.registration.verification.message.facebook');
        }
        return redirect()->route('frontend.user.registration.verification.message');
        // return redirect(RouteServiceProvider::HOME);
    }

    public function facebookCreate()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback()
    {
        // $countries  = Country::cursor();
        // $seperate_name = explode(" ", "Binod Giri");
        // $first_name = $seperate_name[0];
        // $last_name = $seperate_name[1];
        $password  = Str::random();
        // $user_detail = [
        //     "first_name" => $first_name,
        //     "last_name" => $last_name,
        //     "email" => "unknown_rocks619@yahoo.com",
        //     "uid" => 5809757625703755,
        //     "password" => $password,
        //     "password_confirmation" => $password
        // ];
        // return view("frontend.auth.social.facebook", compact("countries", "user_detail"));
        $fb_user = Socialite::driver("facebook")->user();
        // check if this email is already used or not .
        $db_user = User::where('source', 'facebook')->where('source_id', $fb_user->id)->where('status', 'active')->first();
        if (!$db_user) {
            $countries  = Country::cursor();
            $seperate_name = explode(" ", $fb_user->name);
            $first_name = $seperate_name[0];
            $last_name = $seperate_name[1];
            $user_detail = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => "unknown_rocks619@yahoo.com",
                "uid" => 5809757625703755,
                "password" => $password,
                "password_confirmation" => $password
            ];

            session()->put("source", 'facebook');
            session()->put("user_detail", $user_detail);
            return view("frontend.auth.social.facebook", compact("countries", "user_detail"));
        }
        Auth::login($db_user, true);
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
        $password  = Str::random();
        if (!$db_user) {
            $user_detail = [
                "first_name" => $g_user->user["given_name"],
                "last_name" => $g_user->user["family_name"],
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

        Auth::login($db_user, true);
        return redirect(RouteServiceProvider::HOME);
    }

    public function googleForm()
    {
        $countries  = Country::cursor();
        $user_detail = session()->get("user_detail");
        return view("frontend.auth.social.facebook", compact("countries", "user_detail"));
    }
}
