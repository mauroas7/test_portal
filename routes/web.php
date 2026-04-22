<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // En la sección de Rutas exclusivas para el Director
Route::get('/panel', function () {
    if (Auth::user()->role !== 'director') {
        abort(403, 'Acceso denegado.');
    }
    
    // EXTREMADAMENTE IMPORTANTE: Traer los datos de la tabla doctors
    $medicos = \App\Models\Doctor::with(['user', 'specialty'])->get(); 
    
    // Enviarlos a la vista con compact
    return view('director.dashboard', compact('medicos'));
})->name('director.panel');

        // 2. Alta de Profesionales Médicos
        // (A futuro) Proteger estas rutas con el if() o un Middleware.
        Route::get('/alta-medico', [DirectorController::class, 'createDoctor'])->name('director.create-doctor');
        Route::post('/alta-medico', [DirectorController::class, 'storeDoctor'])->name('director.store-doctor');
        
    });

// RUTAS EXCLUSIVAS PARA MÉDICOS (MULTI-AUTH)
Route::prefix('medicos')->name('doctor.')->group(function () {
    
    // Rutas públicas para médicos (Solo invitados médicos)
    Route::middleware('guest:doctor')->group(function () {
        Route::get('/login', [DoctorAuthController::class, 'create'])->name('login');
        Route::post('/login', [DoctorAuthController::class, 'store']);
    });

    // Rutas protegidas (Solo médicos logueados)
    Route::middleware('auth:doctor')->group(function () {
        Route::get('/dashboard', function () {
            return view('doctor.dashboard'); 
        })->name('dashboard');

        Route::post('/logout', [DoctorAuthController::class, 'destroy'])->name('logout');
    });
});

require __DIR__.'/auth.php';