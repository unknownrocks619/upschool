<?php

namespace App\Notifications\Frontend\User;

use App\Models\EmailVerify;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class RegistrationNotification extends Notification
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        // $user = $this->user;
        $random_key = Str::random(16);
        $verify = new EmailVerify;
        $verify->user_id = $this->user->id;
        $verify->signature = $random_key;
        $verify->verified = ($this->user->source == "signup") ? false : true;

        $verificationUrl = URL::temporarySignedRoute('frontend.user.registration.verification', now()->addHour(), ["uuid" => $random_key]);
        $first_name = $this->user->first_name;
        try {
            $verify->save();
            session()->forget(["user_detail", "source"]);
        } catch (\Throwable $th) {
            //throw $th;
            throw new Exception("Unable to process at the moment. Please try again after few minute.");
            return;
        }

        if ($this->user->source != "signup") {
            return (new MailMessage)
                ->subject("Verify Your Email")
                ->from("noreply@upschool.co")
                ->markdown("frontend.mail.user.registration", compact('verificationUrl', 'first_name'));
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
