<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Admin\User\PasswordResetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    //

    public function teachers()
    {
        if (auth()->user()->role != 2) {
            abort(404);
        }
        // first check to which org does this user belongs
        $users = auth()->user()->organisations;
        if ($users->count()) {
            $users = $users[0]->users->pluck('id');
        }
        $users = User::whereIn('id', $users)->where('id', '!=', auth()->id())->where('role', 3)->with(["user_role"])->latest()->get();
        return view("frontend.user.organisation.index", compact('users'));
    }
    public function students()
    {
        if (auth()->user()->role != 2 && auth()->user()->role != 3) {
            abort(404);
        }
        // first check to which org does this user belongs
        $users = auth()->user()->organisations;
        if ($users->count()) {
            $users = $users[0]->users->pluck('id');
        }
        $users = User::whereIn('id', $users)->where('id', '!=', auth()->id())->whereIn('role', [4, 5, 6, 7, 8])->latest()->get();
        return view("frontend.user.organisation.index", compact('users'));
    }

    public function resources($role, $user)
    {
        $resource_user = User::with(["courses"])->findOrFail($user);
        if (!auth()->user()->organisations->count() || !$resource_user->organisations->count()) {
            abort(404);
        }

        if (!auth()->user()->organisations[0] != !$resource_user->organisations[0]) {
            abort(403);
        }

        return view("frontend.user.resources", compact('resource_user'));
    }

    public function removeUser(User $user)
    {
        /**
         * To remove user 
         * Current User and Selected user must be from same org
         * and current user role should either be org or teacher.
         */
        if (!auth()->user()->organisations->count() ||  !$user->organisations->count()) {
            session()->flash('error', "You are not authorized to perform this action.");

            return back();
        }

        if (auth()->user()->role != 2 && auth()->user()->role != 3) {
            session()->flash('error', "You are not authorized to perform this action. ");

            return back();
        }

        if (auth()->user()->organisations[0]->id != $user->organisations[0]->id) {
            session()->flash('error', "You are not authorized to perform this action.");

            return back();
        }

        try {
            $user->organisation_student->delete();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Oops ! Something went wrong.");

            return back();
        }

        session()->flash('success', "{$user->full_name()} has been removed from your organisation.");

        return redirect()->route('frontend.manage.' . $user->user_role->slug);
    }

    public function updateStatus(User $user)
    {
        /**
         * To remove user 
         * Current User and Selected user must be from same org
         * and current user role should either be org or teacher.
         */
        if (!auth()->user()->organisations->count() || !$user->organisations->count()) {
            session()->flash('error', "You are not authorized to perform this action count.");

            return back();
        }

        if (auth()->user()->role != 2 && auth()->user()->role != 3) {

            session()->flash('error', "You are not authorized to perform this action role." . auth()->user()->role);

            return back();
        }
        if (auth()->user()->organisations[0]->id != $user->organisations[0]->id) {
            session()->flash('error', "You are not authorized to perform this action org.");

            return back();
        }

        $user->status = ($user->status == "active") ? 'inactive' : 'active';
        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Oops ! Something went wrong.");

            return back();
        }

        session()->flash("success" . "User status changed.");
        return back();
    }

    public function resetPassword(User $user)
    {

        if (!auth()->user()->organisations->count() || !$user->organisations->count()) {
            abort(404);
        }

        if (auth()->user()->organisations[0]->id != $user->organisations[0]->id) {
            abort(404);
        }

        $random_password = Str::random(8);
        $user->password = Hash::make($random_password);

        try {
            $user->save();
            Notification::send($user, new PasswordResetNotification($user, $random_password));
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Oops ! Someting went wrong.");
            return back();
        }

        session()->flash('success', "Password Reset Success.");
        return back();
    }
}
