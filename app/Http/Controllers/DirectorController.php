<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller

{
    // ==========================================
    // MÓDULO: PANEL PRINCIPAL (EQUIPO MÉDICO)
    // ==========================================

    public function panel(Request $request)
        {
            $buscar = $request->get('buscar');
            $especialidad_id = $request->get('especialidad'); // Capturamos el filtro

            $medicos = Doctor::with(['user', 'specialty'])
                ->when($buscar, function ($query) use ($buscar) {
                    $query->where('matricula', 'like', "%{$buscar}%")
                        ->orWhereHas('user', function ($q) use ($buscar) {
                            $q->where('name', 'like', "%{$buscar}%")
                            ->orWhere('last_name', 'like', "%{$buscar}%");
                        });
                })
                // Si se seleccionó una especialidad, filtramos por esa especialidad
                ->when($especialidad_id, function ($query) use ($especialidad_id) {
                    $query->where('specialty_id', $especialidad_id);
                })
                ->paginate(10);

            return view('director.panel', compact('medicos', 'buscar', 'especialidad_id'));
        }

    // ==========================================
    // MÓDULO: ALTA DE MÉDICOS
    // ==========================================

    public function createDoctor()

    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('director.create-doctor', compact('specialties'));
    }

    public function storeDoctor(Request $request)

    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'matricula' => 'required|string|unique:doctors,matricula',
            'specialty_id' => 'required|exists:specialties,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'doctor',
            ]);

            $user->doctor()->create([
                'matricula' => $validated['matricula'],
                'specialty_id' => $validated['specialty_id'],
            ]);
        });
        return redirect()->route('director.panel')->with('success', 'Médico registrado correctamente.');
    }

    // ==========================================
    // MÓDULO: AUDITORÍA DE PACIENTES
    // ==========================================
    public function patients(Request $request)

    {
        // Capturamos lo que el usuario escribe en el buscador
        $buscar = $request->get('buscar');
        $pacientes = Patient::with('user')
            ->when($buscar, function ($query) use ($buscar) {
                // Buscamos por DNI en la tabla patients OR por nombre/apellido en la tabla users
                $query->where('dni', 'like', "%{$buscar}%")
                    ->orWhereHas('user', function ($q) use ($buscar) {
                        $q->where('name', 'like', "%{$buscar}%")
                            ->orWhere('last_name', 'like', "%{$buscar}%");
                    });
            })
            ->latest()
            ->paginate(10); // Cargamos de a 10
        return view('director.patients', compact('pacientes', 'buscar'));

    }

    public function index()
    {
        // Estadísticas rápidas y livianas
        $stats = [
            'total_medicos'        => Doctor::count(),
            'total_pacientes'      => Patient::count(),
            'total_especialidades' => Specialty::count(),
            'nuevos_medicos'       => Doctor::where('created_at', '>=', now()->subDays(7))->count(),
        ];
        return view('director.dashboard', compact('stats'));
    }

    public function createSpecialty()
    {
        return view('director.create-specialty');
    }

    public function storeSpecialty(Request $request)
    {
        // Validamos que el nombre sea único para no tener "Pediatría" dos veces
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialties,name',
        ]);

        Specialty::create($validated);
        return redirect()->route('director.specialties')->with('success', 'Especialidad registrada con éxito.');

    }

    public function specialties()
    {
        // Traemos las especialidades y contamos cuántos médicos tiene cada una
        // Esto es lo que permite mostrar el contador en las tarjetas
        $specialties = Specialty::withCount('doctors')->orderBy('name', 'asc')->get();

        return view('director.specialties', compact('specialties'));
    }
}