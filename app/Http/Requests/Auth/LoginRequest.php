<?php

namespace App\Http\Requests\Auth;

use App\Models\Corcel\WpUser;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Rules\GoogleCaptcha;
use Carbon\Carbon;
use Corcel\Laravel\Auth\AuthUserProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            // "recaptcha_token" => ["required", new GoogleCaptcha()]
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $validate = $this->only('email', 'password');

        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {

            $wpUser = $this->WPAutheticate();

            if (!$wpUser) {
                RateLimiter::hit(request()->ip());
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
            $wpInstance = new User();
            foreach ($this->WPMeta($wpUser) as $attribute => $value) {
                $wpInstance->$attribute = $value;
            }
            dd($wpInstance);
            $wpInstance->save();
            Auth::attempt($this->only(['email', 'password']));
        }
        RateLimiter::clear(request()->ip());
    }

    /**
     * WP-Login
     */

    public function WPAutheticate()
    {
        $userProvider = new AuthUserProvider;
        $user = $userProvider->retrieveByCredentials(request()->only('email'));
        if (!is_null($user)  && $userProvider->validateCredentials($user, request()->only('password'))) {
            return $user;
        }
        return false;
    }


    public function WPMeta($user)
    {

        $users_record = [
            "first_name" => '',
            "middle_name"  => '',
            "last_name" => '',
            'source' => 'WP_IMPORT',
            'username' => '',
            'status' => 'active',
            'avatar' => '',
            'email' => $user->user_email,
            'email_verified_at' => \Carbon\Carbon::now(),
            'created_at' => $user->user_registered,
            'updated_at' => $user->user_registered,
        ];

        $wp_level = [
            "student-over-18" => "student_above",
            "parents-of-student" => "parent",
            "student-under-18" => "student_below",
            "school-teacher" => "teacher"
        ];

        $first_name = $user->meta()->where('meta_key', 'first_name')->first();

        if ($first_name) {
            $users_record['first_name'] = $first_name->meta_value;
        }
        $last_name = $user->meta()->where('meta_key', 'last_name')->first();

        if ($last_name) {
            $users_record['last_name'] = $last_name->meta_value;
        }

        $users_record['username'] = ($user->user_login) ? $user->user_login : Str::random(8);

        $wp_capabilities = $user->meta()->where('meta_key', 'wp_capabilities')->first();
        $first_strip = preg_replace_array('/(\w\:\w\:\{\w\:\d+\:\")/', [''], $wp_capabilities->meta_value);
        $last_strip = preg_replace_array('/\"\;\w\:\w\;\}$/', [''], $first_strip);

        if (array_key_exists($last_strip, $wp_level)) {
            $role = Role::where('slug', $wp_level[$last_strip])->first();
            $users_record['role'] = $role->id;
        }

        $country = $user->meta()->where('meta_key', 'billing_country')->first();

        if ($country) {
            $db_country = Country::where('code', $country->meta_value)->first();


            if ($db_country) {
                $users_record['country'] = $db_country->name;
            } else {
                $users_record['country'] = $country;
            }
        }
        return $users_record;
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts(request()->ip(), 3)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn(request()->ip());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
