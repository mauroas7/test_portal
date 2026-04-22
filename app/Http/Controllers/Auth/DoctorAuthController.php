<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    // Muestra la vista del login
    public function create()
    {
        return view('doctor.auth.login');
    }

    // Procesa el inicio de sesión
    public function store(Request $request)
    {
        // Validamos que ingrese email y contraseña
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentamos iniciar sesión usando EL GUARDIA 'doctor'
        if (Auth::guard('doctor')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Si es exitoso, lo enviamos a su panel
            return redirect()->intended('/medicos/dashboard');
        }

        // Si falla, lo devolvemos con error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros médicos.',
        ])->onlyInput('email');
    }

    // Cierre de sesión
    public function destroy(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/medicos/login');
    }
}
