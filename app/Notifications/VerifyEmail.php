<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );


        return (new MailMessage)
            ->subject('🎉 Confirma tu cuenta en CashTrackr')
            ->greeting('¡Hola!')

            ->line('Gracias por registrarte en CashTrackr.')
            ->line('Para activar tu cuenta y comenzar a utilizar la plataforma, es necesario confirmar tu correo electrónico.')

            ->action('✅ Confirmar Cuenta', url($verificationUrl))

            ->line('Si tú no realizaste este registro, puedes ignorar este mensaje sin ningún problema.')

            ->salutation('Saludos, Equipo de CashTrackr');
    }


}
