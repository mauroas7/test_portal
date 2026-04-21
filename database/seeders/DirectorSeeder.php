<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Director',
            'email' => 'director@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'director',
        ]);
    }
}