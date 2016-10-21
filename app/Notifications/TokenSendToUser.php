<?php namespace App\Notifications;

/**
 * Use to control process of TokenSendToUser
 * @date 10/21/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TokenSendToUser extends Notification
{
    use Queueable;

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
        return (new MailMessage)
                    ->subject('Login in Resume without password')
                    ->greeting('Hello ' . $notifiable->user->name . '!')
                    ->line('You are receiving this email because we received a login request without using password for your account.')
                    ->action('Login to Resume', url('login/email', $notifiable->token))
                    ->line('If you did not request login without using password, no further action is required.');
    }
}
