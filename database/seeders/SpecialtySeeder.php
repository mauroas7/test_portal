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
    $especialidades = ['Cardiología', 'Pediatría', 'Traumatología', 'Dermatología'];
    foreach ($especialidades as $nombre) {
        \App\Models\Specialty::create(['name' => $nombre]);
    }
}
}
