<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ResetPasswordForm extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $statusMessage = ''; // Para mostrar éxito al final

    // El método mount captura los datos de la URL
    public function mount(Request $request, $token = null)
    {
        $this->token = $token;
        $this->email = $request->query('email');
    }

    public function resetPassword(AuthService $authService)
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ]);

        // Usamos el servicio
        $status = $authService->resetPassword([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ]);

        if ($status === Password::PASSWORD_RESET) {
             // Éxito: Mostramos mensaje y quizás redirigimos al login después de unos segundos
            $this->statusMessage = '¡Tu contraseña ha sido restablecida con éxito! Ahora puedes iniciar sesión.';
            // Opcional: Redirigir automáticamente
            // return redirect()->route('login')->with('status', 'Contraseña restablecida');
        } else {
            // Error (token vencido o email incorrecto)
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password-form')
            ->extends('layouts.guest')
            ->section('content');
    }
}
