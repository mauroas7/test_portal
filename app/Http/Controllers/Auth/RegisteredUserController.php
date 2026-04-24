<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. VALIDACIÓN
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'], 
            'dni' => ['required', 'string', 'max:20', 'unique:patients,dni'], // Validamos contra la tabla patients
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:masculino,femenino'],
            'health_insurance' => ['required', 'string'],
            'health_plan' => ['required', 'string'],
        ]);

        // 2. EJECUCIÓN ATÓMICA
        $user = DB::transaction(function () use ($request) {
            
            // A. Crear la cuenta de acceso (Identidad Completa)
            $user = User::create([
                'name'      => $request->name,
                'last_name' => $request->last_name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => 'paciente',
            ]);

            // B. Crear el perfil de paciente vinculado (Solo datos clínicos/contacto)
            $user->patient()->create([
                'dni'   => $request->dni,
                'phone' => $request->phone,
                'birth_date'       => $request->birth_date,
                'gender'           => $request->gender,
                'health_insurance' => $request->health_insurance,
                'health_plan'      => $request->health_plan,
            ]);

            return $user;
        });

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false)); 
    }
}