<?php

namespace App\Observers\Admin;

use App\Models\User;
use App\Notifications\Frontend\User\RegistrationNotification;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function created(User $user)
    {
        //
        if ($user->source == "email") {
            (Notification::send($user, new RegistrationNotification($user)));
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
        if ($user->organisations) {
            $user->organisations()->delete();
        }

        if ($user->courses) {
            $user->courses()->delete();
        }
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
