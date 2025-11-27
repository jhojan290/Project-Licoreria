<?php
namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function login(string $email, string $password): bool 
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    // --- NUEVO MÉTODO PARA REGISTRO ---
    public function register(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user', // Siempre se crea como usuario normal
        ]);
    }
}