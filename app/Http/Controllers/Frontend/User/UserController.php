<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\PasswordChangeRequest;
use App\Http\Requests\Frontend\User\ProfileUpdateRequest;
use App\Models\EmailVerify;
use App\Models\ResetPassword;
use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use App\Notifications\Frontend\User\ResetPasswordLinkNotification;
use App\Rules\GoogleCaptcha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Upload\Media\Traits\FileUpload;

class UserController extends Controller
{
    //
    use FileUpload;

    public function checkSocialLoginMessage()
    {
        return view('frontend.auth.register-message');
    }
    public function checkEmailMessage()
    {
        return view('frontend.auth.check-email-updated');
        return view("frontend.auth.check-email");
    }

    public function verifyEmail(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(402);
        }

        $user = EmailVerify::where('signature', $request->uuid)->firstOrFail();

        if ($user->verified) {
            abort(401);
        }
        $user->verified = true;
        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Unable to verify. Please try again.");
            return redirect()->route('login');
        }

        session()->flash('success', "Congratulation ! Your email address has been verified. Please login to access your dashboard.");
        return redirect()->route('login');
    }

    public function resendVerificationSend(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "recaptcha_token" => ["required", new GoogleCaptcha($request)]
        ]);

        // check if email exist.
        $exists = User::where('email', $request->email)->first();

        if (!$exists) {
            session()->flash("success", "Please check your email address for verification link.");
            return back();
        }

        if ($exists->verify_email) {
            $exists->verify_email->delete();
        }
        Notification::send($exists, new RegistrationNotification($exists));
        session()->flash('success', "Please check your email address for verification link.");
        return back();
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            'recaptcha_token' => ["required", new GoogleCaptcha($request)]
        ]);

        // check if email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            session()->flash("success", "An email with reset link has been sent to your email.");
            return back();
        }

        // since user exists. let's create reset link.
        $reset_password = new ResetPassword;
        $user->reset_password()->delete();
        $reset_password->token = encrypt(Str::random(12));
        $reset_password->created_at = Carbon::now()->format("Y-m-d H:i:s");
        $reset_password->user_id = $user->id;

        try {
            $reset_password->save();
            // send email with reset password
            Notification::send($user, new ResetPasswordLinkNotification($user, $reset_password->token));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        session()->flash("success", "An email with reset link has been sent to your email.");
        return back();
    }

    public function verifyResetLink(Request $request, $token)
    {
        $verifyToken = ResetPassword::where('token', $token)->firstorFail();

        // check when this link was generated.
        $current_date = Carbon::now();
        $generated_date = Carbon::parse($verifyToken->created_at);


        if ($current_date->diffInHours($generated_date) > 1) {
            $verifyToken->delete();
            session()->flash("warning", "Sorry, Token has expired.");
            return redirect()->route('login');
        }

        $user = $verifyToken->user;
        return view("frontend.auth.reset.reset-password", compact("user"));
    }

    public function updatePassword(Request $request, $user)
    {
        $request->validate([
            "email" => "required",
            "password" => ["required", "confirmed"],
            'recaptcha_token' => ["required", new GoogleCaptcha($request)]
        ]);

        $user = User::findOrFail(decrypt($user));

        $user->password = Hash::make($request->password);

        try {
            DB::transaction(function () use ($request, $user) {
                $user->reset_password()->delete();
                $user->save();
            });
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Oops ! Something went wrong. Please Try again.");
            return back();
        }


        session()->flash('success', "Password Changed. Login with your new password");
        return redirect()->route('login');
    }

    public function profile()
    {
        return view("frontend.user.edit");
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->country = $request->country;
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->username = $request->username;

        if ($request->hasFile("profile")) {
            $this->set_access("file");
            $this->set_upload_path("website/profile");
            $user->avatar = $this->upload("profile");
        }
        try {
            if ($user->isDirty('email')) {
                DB::transaction(function () use ($user) {
                    $user->save();
                    // also reset user verification stat.
                    $user->verify_email->delete();
                    Notification::send($user, new RegistrationNotification($user));
                });
            } else {
                $user->save();
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Unable to update profile.");
            return back();
        }

        session()->flash('success', "Profile detail updated.");
        return back();
    }

    public function password()
    {
        return view('frontend.user.password');
    }

    public function changePassword(PasswordChangeRequest $request)
    {
        // check old password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            session()->flash('error', "Old password didn't match.");
            return back();
        }

        $user = auth()->user();
        $user->password = Hash::make($request->password);

        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Unable to update password.");
            return back();
        }

        session()->flash('success', "Password has been changed. Please re-login with new password.");
        auth()->logout();
        return redirect()->route('login');
    }
}
