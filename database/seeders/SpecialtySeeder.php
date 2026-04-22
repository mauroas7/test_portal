<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            'Cardiología', 'Pediatría', 'Dermatología', 'Neurología', 'Traumatología'
        ];

        foreach ($especialidades as $especialidad) {
            // firstOrCreate busca si ya existe. Si existe, no hace nada. Si no, lo crea.
            \App\Models\Specialty::firstOrCreate([
                'name' => $especialidad
            ]);
        }
    }
}