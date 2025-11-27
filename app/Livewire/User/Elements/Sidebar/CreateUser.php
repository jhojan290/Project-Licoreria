<?php

namespace App\Livewire\User\Elements\Sidebar;

use Livewire\Component;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation; // <--- Obligatorio para verificar contraseña

    public function register(AuthService $authService)
    {
        // 1. Validaciones
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email', // Verifica que no exista ya
            'password' => 'required|min:8|confirmed', // 'confirmed' busca que coincida con password_confirmation
        ], [
            // Mensajes personalizados (opcional)
            'name.min' => 'El nombre debe tener mínimo 3 caracteres',
            'name.required' => 'El campo nombre es obligatorio',
            'email.unique' => 'Este correo ya está registrado.',
            'email.required' => 'El campo email es obligatorio',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.required' => 'El campo contraseña es obligatorio'
        ]);

        // 2. Crear el usuario usando el servicio
        $user = $authService->register([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        // 3. Loguear automáticamente al nuevo usuario
        Auth::login($user);
        session()->regenerate();

        // 4. Redirigir al inicio del usuario
        return redirect()->route('user.home');
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar.createUser');
    }
}
