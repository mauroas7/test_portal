<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard genérico (usado por pacientes mayormente)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// RUTAS PROTEGIDAS (Requieren Login)
Route::middleware('auth')->group(function () {
    
    // Perfil de Usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ------------------------------------------------------------------
    // SECCIÓN DIRECTOR (Gestión Administrativa)
    // ------------------------------------------------------------------
    Route::prefix('director')->group(function () {
        // 1. La nueva HOME (Estadísticas)
        Route::get('/dashboard', [DirectorController::class, 'index'])->name('director.dashboard');
        
        // 2. Listados (Secciones secundarias)
        Route::get('/panel', [DirectorController::class, 'panel'])->name('director.panel');
        Route::get('/pacientes', [DirectorController::class, 'patients'])->name('director.patients');

        // 3. Gestión de Médicos (Registro)
        Route::get('/alta-medico', [DirectorController::class, 'createDoctor'])->name('director.create-doctor');
        Route::post('/alta-medico', [DirectorController::class, 'storeDoctor'])->name('director.store-doctor');

        // 4. Gestión de Especialidades
        Route::get('/especialidades', [DirectorController::class, 'specialties'])->name('director.specialties');
        Route::get('/especialidades/crear', [DirectorController::class, 'createSpecialty'])->name('director.create-specialty');
        Route::post('/especialidades', [DirectorController::class, 'storeSpecialty'])->name('director.store-specialty');
    });
});

// RUTAS EXCLUSIVAS PARA MÉDICOS (MULTI-AUTH)
Route::prefix('medicos')->name('doctor.')->group(function () {
    Route::middleware('guest:doctor')->group(function () {
        Route::get('/login', [DoctorAuthController::class, 'create'])->name('login');
        Route::post('/login', [DoctorAuthController::class, 'store']);
    });

    Route::middleware('auth:doctor')->group(function () {
        Route::get('/dashboard', function () {
            return view('doctor.dashboard'); 
        })->name('dashboard');
        Route::post('/logout', [DoctorAuthController::class, 'destroy'])->name('logout');
    });
});

require __DIR__.'/auth.php';