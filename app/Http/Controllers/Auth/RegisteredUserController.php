<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Canva;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

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
        return view('frontend.auth.register.index', compact('countries'));
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
            'first_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:30'],
            "canva" => ["required", "in:yes,no"],
            "personal_detail" => ["required_if:canva,yes"],
            "canva_free" => ["required_if:canva,yes"],
            'role' => ['required', 'string', 'max:30', Rule::in(["student_above", "student_below", "parent", "teacher"])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ["accepted"],
        ]);
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->country = Country::find($request->country)->name;
        $user->role = Role::where('slug', Str::replace("-", '_', $request->role))->first()->id;
        $user->source = "signup";
        $user->username = Str::random(8);
        $user->password = Hash::make($request->password);
        $user->gender = "male";
        $user->email = $request->email;

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
                (Notification::send($user, new RegistrationNotification($user)));
            });
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // event(new Registered($user));
        // Auth::login($user);

        return redirect()->route('frontend.user.registration.verification.message');
        // return redirect(RouteServiceProvider::HOME);
    }
}
