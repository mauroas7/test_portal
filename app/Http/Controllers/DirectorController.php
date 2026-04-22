<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller
{
    public function createDoctor()
    {
        // Ordenamos las especialidades alfabéticamente 
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('director.create-doctor', compact('specialties'));
    }

    public function storeDoctor(Request $request)
    {
        // 1. VALIDACIÓN
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'matricula' => 'required|string|unique:doctors,matricula',
            'specialty_id' => 'required|exists:specialties,id',
            'email' => 'required|email|unique:users,email', // OJO: Ahora validamos contra la tabla 'users'
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. EJECUCIÓN ATÓMICA (Transacción)
        // Usamos DB::transaction para que si algo falla, no se guarde nada a medias.
        DB::transaction(function () use ($validated) {
            
            // A. Creamos la cuenta de acceso en la tabla 'users'
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'doctor', // Definimos el rol
            ]);

            // B. Creamos el perfil médico en la tabla 'doctors' vinculado al usuario
            // Aprovechamos la relación que definimos en el modelo User
            $user->doctor()->create([
                'last_name' => $validated['last_name'],
                'matricula' => $validated['matricula'],
                'specialty_id' => $validated['specialty_id'],
            ]);
        });

        return redirect()->route('director.panel')->with('success', 'Médico registrado exitosamente con su cuenta de acceso.');
    }
}