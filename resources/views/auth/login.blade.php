<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Ingreso | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_color.png') }}?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div class="w-full max-w-5xl bg-white shadow-[0_20px_60px_rgba(0,0,0,0.1)] flex flex-col md:flex-row overflow-hidden" style="border-radius: 32px;">
            
            <div class="hidden md:flex md:w-5/12 flex-col justify-between p-12 relative overflow-hidden" style="background-color: #003764;">
                {{-- Círculo decorativo en dorado --}}
                <div class="absolute top-[-10%] right-[-10%] w-64 h-64 bg-[#C7A36E] opacity-10 rounded-full"></div>

                <div class="relative z-10">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo Hospital Universitario" class="w-48 h-auto mb-12 brightness-0 invert">
                    
                    <h2 class="text-4xl font-black mb-6 leading-tight text-white">
                        Bienvenido al <br><span style="color: #C7A36E;">Portal de Pacientes.</span>
                    </h2>
                    <p class="text-sm font-medium text-blue-100 leading-relaxed max-w-xs">
                        Acceda para coordinar sus turnos, consultar resultados y gestionar su salud de manera integral.
                    </p>
                </div>
                
                <div class="relative z-10 space-y-4">
                    <div style="height: 4px; width: 40px; background-color: #C7A36E; border-radius: 2px;"></div>
                    <p class="text-[10px] font-black text-blue-200 uppercase tracking-[0.3em]">
                        Portal de Pacientes
                    </p>
                </div>
            </div>

            <div class="w-full md:w-7/12 p-8 sm:p-12 lg:p-20 flex flex-col justify-center bg-white relative">
                <div class="md:hidden flex justify-center mb-10">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo" class="w-48 h-auto">
                </div>

                <div class="mb-12">
                    <h1 class="font-black text-4xl mb-3" style="color: #003764;">Iniciar Sesión</h1>
                    <p class="font-medium text-gray-500" style="font-size: 15px;">
                        ¿Sos parte de un equipo médico? 
                        <a href="{{ route('doctor.login') }}" style="color: #C7A36E;" class="font-bold hover:underline">Ingresar aquí</a>
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="space-y-6 mb-10">
                        <div>
                            <label for="email" class="block text-[10px] font-black uppercase tracking-[0.2em] mb-3 ml-1" style="color: #59595b;">Correo Electrónico</label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="paciente@hospital.com"
                                required 
                                autofocus 
                                class="w-full px-6 py-4 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]"
                                style="font-size: 15px;"
                            >
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-3 ml-1">
                                <label for="password" class="block text-[10px] font-black uppercase tracking-[0.2em]" style="color: #59595b;">Contraseña</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" style="color: #C7A36E;" class="text-xs font-bold hover:underline">
                                        ¿La olvidaste?
                                    </a>
                                @endif
                            </div>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                placeholder="••••••••"
                                required 
                                class="w-full px-6 py-4 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold tracking-widest text-[#003764]"
                                style="font-size: 15px;"
                            >
                        </div>
                    </div>

                    <div class="mb-10 flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                id="remember_me" 
                                name="remember"
                                class="rounded-md w-5 h-5 cursor-pointer border-gray-200 text-[#003764] focus:ring-[#003764]"
                            >
                            <label for="remember_me" class="ms-3 text-sm font-bold text-gray-400">
                                Mantener sesión
                            </label>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-5 bg-red-50 border-l-4 border-red-500 rounded-2xl">
                            <ul class="text-sm text-red-700 font-bold">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button 
                        type="submit" 
                        class="w-full py-5 rounded-2xl font-black text-white text-sm uppercase tracking-widest transition-all hover:brightness-110 shadow-lg hover:shadow-2xl active:scale-[0.98]"
                        style="background-color: #003764;"
                    >
                        Ingresar al Portal
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p style="color: #59595b;" class="text-sm font-bold">
                        ¿No tiene una cuenta? 
                        <a href="{{ route('register') }}" style="color: #003764;" class="font-black hover:underline">Registrarse</a>
                    </p>
                </div>

            </div>
        </div>
        
        <p class="text-center mt-10 text-gray-400 text-[10px] font-black uppercase tracking-[0.3em]">
            © 2026 Hospital Universitario | Mendoza, Argentina
        </p>
    </div>
</body>
</html>