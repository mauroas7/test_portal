<?php

namespace Database\Seeders;

// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Esto silencia algunos eventos al crear datos.
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Le decimos a Laravel que vaya a ejecutar el archivo DirectorSeeder
        $this->call([
            DirectorSeeder::class,
        ]);
    }
}