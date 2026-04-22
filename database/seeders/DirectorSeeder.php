<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos la cuenta oficial del Director
        User::create([
            'name' => 'Director',
            'last_name' => 'General',
            'dni' => '11111111',
            'phone' => '2610000000',
            'email' => 'director@hospital.com',
            'role' => 'director',
            'password' => Hash::make('admin123'),
        ]);
    }
}