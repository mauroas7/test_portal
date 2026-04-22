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

<body class="font-sans antialiased" style="background-color: #003764;">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div class="w-full max-w-4xl bg-white shadow-2xl flex flex-col md:flex-row overflow-hidden" style="border-radius: 24px;">
            
            <!-- Panel izquierdo -->
            <div class="hidden md:flex md:w-5/12 bg-gray-50 flex-col justify-between p-10 lg:p-12 border-r border-gray-100 relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#C7A36E] opacity-10 rounded-bl-full"></div>

                <div>
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo Hospital Universitario" class="w-48 h-auto mb-10">
                    
                    <h2 class="text-3xl font-black mb-4 leading-tight" style="color: #003764;">
                        A,<br>a.
                    </h2>
                    <p class="text-sm font-medium text-gray-500 leading-relaxed">
                        Descripción.
                    </p>
                </div>
                
                <div class="space-y-4">
                    <div style="height: 4px; width: 40px; background-color: #C7A36E; border-radius: 2px;"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                        Portal de Pacientes
                    </p>
                </div>
            </div>

            <!-- Panel derecho -->
            <div class="w-full md:w-7/12 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white relative">
                <div class="md:hidden flex justify-center mb-8">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo" class="w-48 h-auto">
                </div>

                <!-- Encabezado del Formulario -->
                <div class="mb-10">
                    <h1 class="font-black text-3xl mb-2" style="color: #003764;">Iniciar Sesión</h1>
                    <p class="font-medium" style="color: #59595b; font-size: 14px;">
                        Si sos parte del Equipo Médico, ingresá <a href="#" style="color: #C7A36E;" class="font-bold hover:underline">aquí</a>.
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Inputs del formulario -->
                    <div class="space-y-6 mb-8">
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Correo Electrónico</label>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="paciente@hospital.com"
                                required 
                                autofocus 
                                class="w-full px-5 py-4 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium"
                                style="color: #59595b; font-size: 15px;"
                            >
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2 ml-1">
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider" style="color: #003764;">Contraseña</label>
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
                                class="w-full px-5 py-4 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium tracking-widest"
                                style="color: #59595b; font-size: 15px;"
                            >
                        </div>
                    </div>

                    <div class="mb-8 flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            name="remember"
                            class="rounded w-4 h-4 cursor-pointer border-gray-300 text-[#003764] focus:ring-[#003764]"
                        >
                        <label for="remember_me" class="ms-3 text-sm font-medium" style="color: #59595b;">
                            Mantener sesión iniciada
                        </label>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                            <p class="text-sm text-red-800 font-bold mb-1">Error de autenticación:</p>
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button 
                        type="submit" 
                        class="w-full py-4 rounded-xl font-bold text-white text-lg transition-all hover:bg-blue-900 shadow-md hover:shadow-xl active:scale-[0.98]"
                        style="background-color: #003764;"
                    >
                        Ingresar al Portal
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p style="color: #59595b;" class="text-sm font-medium">
                        ¿Aún no sos paciente del hospital? 
                        <a href="{{ route('register') }}" style="color: #003764;" class="font-bold hover:underline">Creá tu cuenta</a>
                    </p>
                </div>

            </div>
        </div>
        
        <!-- Copyright (afuera de la tarjeta) -->
        <p class="text-center mt-8 text-white/50 text-xs font-medium">
            © 2026 Hospital Universitario | UNCuyo
        </p>

    </div>
</body>
</html>