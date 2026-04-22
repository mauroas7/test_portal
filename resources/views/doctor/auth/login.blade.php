<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Acceso Médico | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_color.png') }}?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="background-color: #003764;">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        
        <!-- Panel Dividido -->
        <div class="w-full max-w-4xl bg-white shadow-2xl flex flex-col md:flex-row overflow-hidden" style="border-radius: 24px;">
            
            <!-- PANEL IZQUIERDO: Información -->
            <div class="hidden md:flex md:w-5/12 bg-gray-50 flex-col justify-between p-10 lg:p-12 border-r border-gray-100 relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#C7A36E] opacity-10 rounded-bl-full"></div>

                <div>
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo Hospital Universitario" class="w-48 h-auto mb-10">
                    
                    <h2 class="text-3xl font-black mb-4 leading-tight" style="color: #003764;">
                        Portal del<br>Equipo Médico.
                    </h2>
                    <p class="text-sm font-medium text-gray-500 leading-relaxed">
                        Acceso exclusivo para profesionales de la salud y personal administrativo del Hospital Universitario.
                    </p>
                </div>
                
                <div class="space-y-4">
                    <div style="height: 4px; width: 40px; background-color: #C7A36E; border-radius: 2px;"></div>
                    <p class="text-xs font-bold text-[#C7A36E] uppercase tracking-widest">
                        Staff del hospital
                    </p>
                </div>
            </div>

            <!-- PANEL DERECHO: Formulario de Ingreso -->
            <div class="w-full md:w-7/12 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
                
                <div class="md:hidden flex justify-center mb-8">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo" class="w-48 h-auto">
                </div>

                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined" style="color: #C7A36E;">medical_services</span>
                        <span class="text-xs font-black uppercase tracking-widest" style="color: #C7A36E;">Ingreso Profesional</span>
                    </div>
                    <h1 class="font-black text-3xl" style="color: #003764;">Iniciar Sesión</h1>
                </div>

                <form method="POST" action="{{ route('doctor.login') }}">
                    @csrf

                    <div class="space-y-6 mb-8">
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Correo Institucional</label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                placeholder="usuario@hospital.com"
                                required 
                                autofocus 
                                class="w-full px-5 py-4 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium text-sm"
                            >
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2 ml-1">
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider" style="color: #003764;">Contraseña</label>
                            </div>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                placeholder="••••••••"
                                required 
                                class="w-full px-5 py-4 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium tracking-widest text-sm"
                            >
                        </div>
                    </div>

                    <!-- Errores de Validación -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                            <ul class="text-sm text-red-700 font-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button 
                        type="submit" 
                        class="w-full py-4 rounded-xl font-bold text-white text-lg transition-all shadow-md hover:shadow-xl active:scale-[0.98]"
                        style="background-color: #003764;"
                    >
                        Acceder al Sistema
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p style="color: #59595b;" class="text-sm font-medium">
                        ¿Sos paciente? 
                        <a href="{{ route('login') }}" style="color: #C7A36E;" class="font-bold hover:underline">Volver al portal público</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>