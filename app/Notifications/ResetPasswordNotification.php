<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * El token para el restablecimiento de contraseña.
     *
     * @var string
     */
    public $token;

    /**
     * Crea una nueva instancia de la notificación.
     * Recibimos el token aquí y lo guardamos.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Define los canales de entrega de la notificación.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Define el mensaje de correo electrónico.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // 1. Generamos la URL (Igual que antes)
        $url = url('/reset-password/'.$this->token.'?email='.$notifiable->getEmailForPasswordReset());

        // 2. OBTENEMOS EL NOMBRE DEL USUARIO
        // $notifiable es la instancia del modelo User. Asumimos que tienes un campo 'name'.
        // Usamos ?? 'Usuario' como respaldo por si acaso el nombre estuviera vacío.
        $userName = $notifiable->name ?? 'Usuario';

        return (new MailMessage)
            ->subject('Restablecer Contraseña - LicUp')
            // 3. PASAMOS EL NOMBRE A LA VISTA
            // Agregamos 'name' => $userName al array de datos.
            ->markdown('mail.reset-password', [
                'url' => $url,
                'name' => $userName // <-- Esto es lo nuevo
            ]); 
    }

    /**
     * Representación de la notificación en array (opcional).
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