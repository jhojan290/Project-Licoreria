<?php

namespace App\Livewire\User\Elements\Sidebar;

use Livewire\Component;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function login(AuthService $authService)
    {
        $this->validate(['email' => 'required|email', 'password' => 'required'],['email.required' => 'El campo email es obligatorio', 'password.required' => 'El campo contraseña es obligatorio']);

        if ($authService->login($this->email, $this->password)) {
            session()->regenerate();

            // Usando tu helper isAdmin del modelo User
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.products');
            }
            return redirect()->route('user.home');
        }

        $this->addError('email', 'Datos incorrectos.');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar.login');
    }
}
