<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DirectorSeeder extends Seeder
{
   public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => env('ADMIN_DEFAULT_EMAIL', 'director@hospital.com')], // Condición de búsqueda
            [ // Datos a crear si no existe
                'name' => 'Director',
                'last_name' => 'General',
                'password' => \Illuminate\Support\Facades\Hash::make(env('ADMIN_DEFAULT_PASSWORD', 'admin123')),
                'role' => 'director',
            ]
        );
    }
}