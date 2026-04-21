<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Hospital Universitario - Ingreso</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_color.png') }}?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div style="width: 100%; max-width: 500px;">
            
            <!-- Logo -->
            <div class="flex justify-center items-center mb-8">
                <img 
                    src="{{ asset('img/Logo HU Uso Diario.svg') }}" 
                    alt="Logo Hospital Universitario" 
                    class="w-64 h-auto hover:opacity-90 transition" 
                >
            </div>

            <!-- Contenedor Principal -->
            <div class="bg-white shadow-xl" style="border-top: 4px solid #003764; border-radius: 12px; padding: 40px;">
            
                <!-- Titulo -->
                <h1 class="text-center" style="color: #003764; font-size: 28px; font-weight: 700; margin-bottom: 8px;">
                    Ingreso pacientes
                </h1>

                <!-- Subtitulo -->
                <p class="text-center" style="color: #59595b; font-size: 14px; margin-bottom: 32px;">
                    Si sos parte del Equipo Médico, ingresá <a href="#" style="color: #C7A36E;" class="font-semibold hover:underline">aquí</a>
                </p>

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Colocar mail -->
                    <div class="mb-5 relative">
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="paciente@hospital.com"
                            required 
                            autofocus 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px;"
                        >
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4 relative">
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            placeholder="••••••••"
                            required 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px; letter-spacing: 2px;"
                        >
                    </div>

                    <!-- Link por contraseña olvidada -->
                    <div class="text-right mb-5">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color: #C7A36E;" class="text-sm font-medium hover:underline">
                                ¿Has olvidado tu contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Recordar datos de login -->
                    <div class="mb-6 flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            name="remember"
                            class="rounded w-4 h-4 cursor-pointer"
                            style="accent-color: #003764; border-color: #C7A36E;"
                        >
                        <label for="remember_me" class="ms-3 text-sm font-medium" style="color: #59595b;">
                            Recordar mis datos
                        </label>
                    </div>

                    <!-- Mensajes de error -->
                    @if ($errors->any())
                        <div class="mb-6 p-3 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-xs text-red-700 font-semibold mb-2">Por favor verifica los errores:</p>
                            <ul class="list-disc list-inside text-xs text-red-700 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Botón de envío -->
                    <button 
                        type="submit" 
                        class="w-full py-3 rounded-lg font-bold text-white text-lg transition hover:shadow-lg mb-8"
                        style="background-color: #003764;"
                    >
                        Ingresar al Portal
                    </button>
                </form>

                <!-- Links inferiores -->
                <div class="space-y-3 text-center border-t pt-6" style="border-color: #f3f4f6;">
                    <p style="color: #59595b;" class="text-sm">
                        ¿Primera vez en el hospital? 
                        <a href="{{ route('register') }}" style="color: #003764;" class="font-bold hover:underline">Creá tu cuenta</a>
                    </p>
                    <p style="color: #59595b;" class="text-sm">
                        Conocé más sobre nuestros servicios haciendo 
                        <a href="#" style="color: #C7A36E;" class="font-semibold hover:underline">click aquí</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>