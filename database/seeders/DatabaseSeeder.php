<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aquí llamamos a todos los seeders específicos en orden.
        // Primero creamos a los usuarios base (Director y Paciente)
        $this->call([
            DirectorSeeder::class,
        ]);
    }
}