<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// ↓↓↓ ESTAS SON LAS IMPORTACIONES NUEVAS QUE NECESITAS ↓↓↓
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthService
{
    /**
     * Iniciar sesión 
     */
    public function login(string $email, string $password): bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    /**
     * Registrar nuevo usuario 
     */
    public function register(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'user',
        ]);
    }


    /**
     * Paso 1: Enviar el enlace de recuperación al correo
     */
    public function sendResetLink(string $email): string
    {
        // Laravel se encarga de generar el token y enviar el correo
        return Password::sendResetLink(['email' => $email]);
    }

    /**
     * Paso 3: Restablecer la contraseña con el token
     */
    public function resetPassword(array $data): string
    {
        // Esta función valida el token, el email y que las contraseñas coincidan
        return Password::reset($data, function ($user, $password) {
            $this->resetUserPassword($user, $password);
        });
    }

    /**
     * Función auxiliar privada para guardar la nueva contraseña
     */
    private function resetUserPassword($user, $password)
    {
        $user->forceFill([
            'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60)); // Invalida sesiones anteriores por seguridad

        $user->save();

        event(new PasswordReset($user)); // Dispara evento interno de Laravel
    }
}