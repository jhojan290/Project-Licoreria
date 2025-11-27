<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'jdagudeloadm@gmail.com')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'jdagudeloadm@gmail.com', // Este será tu usuario
                'password' => Hash::make('devadmprue2854#.'), // Esta será tu contraseña
                'role' => 'admin', // <--- Importante: Rol Admin
            ]);
        }
    }
}
