<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserBanRequest;
use App\Http\Requests\Admin\User\UserDestroyRequest;
use App\Http\Requests\Admin\User\UserUnlinkRelationshipRequest;
use App\Http\Requests\Admin\User\UserUpdateRequset;
use App\Models\Canva;
use App\Models\Corcel\WpUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::withCount(["organisations", "courses"])->with(["organisations", "courses", "user_role"])->get();
        return view('admin.users.index', compact('users'));
    }

    public function wp_index()
    {
        $users = WpUser::paginate(20);
        return view('admin.users.wp-index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequset $request, User $user)
    {
    }

    /**
     * @param Request $request, User $user
     * @access Admim
     */
    public function banUser(UserBanRequest $request, User $user)
    {
        $user->status =  ($user->status == "suspend") ? "active" : "suspend";

        try {
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "User account updated.");
        return back();
    }

    public function destroy(UserDestroyRequest $request, User $user)
    {
        // remove user from course and organisation
        try {
            DB::transaction(function () use ($user) {
                if ($user->organisations) {
                    $user->organisations()->delete();
                }
                if ($user->courses) {
                    $user->courses()->delete();
                }

                $user->delete();
            });
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "User Removed.");
        return back();
    }

    public function unlinkRelationShip(UserUnlinkRelationshipRequest $request, User $user)
    {
    }

    public function canvaUser()
    {
        $users = Canva::get();
        return view('admin.users.canva.list', compact("users"));
    }

    public function canvaUserStatus(Request $request, Canva $canva)
    {
        if ($request->type == "approve") {
            $canva->approved = true;
            $canva->rejected = false;
        } else {
            $canva->rejected = true;
            $canva->approved = false;
        }

        $canva->save();

        session()->flash('success', "Status Updated.");
        return back();
    }
}
