<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class FakeDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Generando 5 pacientes de prueba...');
        User::factory(5)->create(['role' => 'paciente'])->each(function ($user) {
            $user->patient()->create([
                'dni' => fake()->unique()->numerify('########'),
                'phone' => fake()->phoneNumber(),
            ]);
        });

        $this->command->info('Generando 5 médicos de prueba...');
        User::factory(5)->create(['role' => 'doctor'])->each(function ($user) {
            $user->doctor()->create([
                'matricula' => 'MAT-' . fake()->unique()->numerify('####'),
                'specialty_id' => fake()->numberBetween(1, 5), 
            ]);
        });
    }
}