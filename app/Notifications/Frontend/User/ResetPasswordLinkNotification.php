<?php

namespace App\Notifications\Frontend\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordLinkNotification extends Notification
{
    use Queueable;
    public $user;
    public $hashKey;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $hashKey)
    {
        //
        $this->user = $user;
        $this->hashKey = $hashKey;
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

        $user = $this->user;
        $token = $this->hashKey;

        return (new MailMessage)
            ->subject("Password Reset Request, Upschool.co")
            ->from("noreply@upschool.co")
            ->markdown('frontend.mail.user.ResetPasswordMail', compact('user', 'token'));
        // return (new MailMessage)
        //     ->line('The introduction to the notification.')
        //     ->action('Notification Action', url('/'))
        //     ->line('Thank you for using our application!');
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
