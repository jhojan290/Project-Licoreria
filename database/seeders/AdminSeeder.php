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
        User::updateOrCreate(
            ['email' => 'stivenydios3816@gmail.com'], // 1. Busca por este campo
            [
                'name' => 'Admin', // <--- AQUÍ CAMBIAS EL NOMBRE
                'password' => Hash::make('admin2025#'), // Se actualiza la contraseña (o se deja la misma)
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'Fredyrb@outlook.com'],
            [
                'name' => 'Fredy',
                'password' => Hash::make('estanqufray2022'),
                'role' => 'admin',
            ]
        );
    }
}
