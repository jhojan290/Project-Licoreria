<?php

namespace App\Livewire\User\Elements\Sidebar;

use Livewire\Component;
use App\Services\Auth\AuthService;
// use Illuminate\Support\Facades\Auth; // <-- YA NO NECESITAS ESTO AQUÍ

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register(AuthService $authService)
    {
        // 1. Validaciones (Igual que antes)
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.min' => 'El nombre debe tener mínimo 3 caracteres',
            'name.required' => 'El campo nombre es obligatorio',
            'email.unique' => 'Este correo ya está registrado.',
            'email.required' => 'El campo email es obligatorio',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.required' => 'El campo contraseña es obligatorio'
        ]);

        // 2. Crear el usuario (Igual que antes)
        $authService->register([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        
        // Disparamos el evento que ya configuramos en tu Sidebar para cambiar de vista
        $this->dispatch('openSidebar', partial: 'login', title: 'Iniciar Sesión', message:'¡Cuenta creada con éxito! Por favor inicia sesión');
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar.createUser');
    }
}