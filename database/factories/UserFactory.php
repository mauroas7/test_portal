<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(), // Identidad unificada
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(), // Marcamos como verificado para las pruebas
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10), // Token de sesión persistente
            'role' => 'paciente', // Rol por defecto para la fábrica
        ];
    }
}