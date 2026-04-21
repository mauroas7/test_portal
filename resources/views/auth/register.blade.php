<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Hospital Universitario - Registro</title>
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
                    src="{{ asset('img/Logo HU Uso Diario.png') }}" 
                    alt="Logo Hospital Universitario" 
                    class="w-64 h-auto hover:opacity-90 transition" 
                >
            </div>

            <!-- Contenedor principal -->
            <div class="bg-white shadow-xl" style="border-top: 4px solid #003764; border-radius: 12px; padding: 40px;">

                <!-- Titulo -->
                <h1 class="text-center" style="color: #003764; font-size: 28px; font-weight: 700; margin-bottom: 8px;">
                    Crear cuenta
                </h1>

                <!-- Subtitulo -->
                <p class="text-center" style="color: #59595b; font-size: 14px; margin-bottom: 32px;">
                    Completá el formulario para registrarte como paciente
                </p>

                <!-- Formulario -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-5 relative">
                        <input 
                            type="text" 
                            id="name"
                            name="name" 
                            value="{{ old('name') }}"
                            placeholder="Nombre completo"
                            required 
                            autofocus 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px;"
                        >
                        @error('name')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-5 relative">
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Correo electrónico"
                            required 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px;"
                        >
                        @error('email')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-5 relative">
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            placeholder="Contraseña"
                            required 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px"
                        >
                        @error('password')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar contraseña -->
                    <div class="mb-6 relative">
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation" 
                            placeholder="Confirmar contraseña"
                            required 
                            class="w-full px-5 py-3 rounded-lg border focus:ring-2 transition"
                            style="border-color: #C7A36E; background-color: #ffffff; color: #59595b; font-size: 15px"
                        >
                        @error('password_confirmation')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <button 
                        type="submit" 
                        class="w-full py-3 rounded-lg font-bold text-white text-lg transition hover:shadow-lg mb-8"
                        style="background-color: #003764;"
                    >
                        Registrarse
                    </button>
                    </form>
            </div> 

            <!-- Link al login -->
            <div class="text-center mt-6">
                <p style="color: #59595b;" class="text-sm">
                    ¿Ya tenés cuenta? 
                    <a href="{{ route('login') }}" style="color: #003764;" class="font-bold hover:underline">Iniciá sesión aquí</a>
                </p>
            </div>
                </form>