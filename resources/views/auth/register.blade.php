<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Consultorio MOVIL - Registro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" style="background-color: #E8D4C0;">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div style="width: 100%; max-width: 500px;">
            <!-- Sección de Logo -->
            <div class="text-center mb-12" style="text-align: center;">
                <div style="color: #D4A574; font-size: 36px; font-weight: 600; letter-spacing: -1px; margin-bottom: 4px;">
                    Consultorio
                </div>
                <div style="color: #5A5A5A; font-size: 20px; font-weight: 600; letter-spacing: 2px;">MOVIL.net</div>
            </div>

            <div style="border: 2px solid #D4A574; border-radius: 12px; padding: 32px; background-color: rgba(255,255,255,0.05);">
            
            <!-- Sección de Título -->
            <h1 class="text-center" style="color: #4A4A4A; font-size: 32px; font-weight: 700; margin-bottom: 10px;">
                Crear cuenta
            </h1>

            <!-- Sección de Subtítulo -->
            <p class="text-center" style="color: #8B8B8B; font-size: 14px; margin-bottom: 28px;">
                Completa el formulario para registrarte como paciente
            </p>

            <!-- Formulario -->
            <div style="border: 1px solid #D4A574; border-radius: 8px; padding: 24px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <input 
                            type="text" 
                            id="name"
                            name="name" 
                            value="{{ old('name') }}"
                            placeholder="Tu nombre completo"
                            required 
                            autofocus 
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 14px;"
                        >
                        @error('name')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Tu correo electrónico"
                            required 
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 14px;"
                        >
                        @error('email')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            placeholder="Contraseña"
                            required 
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 16px; letter-spacing: 3px;"
                        >
                        @error('password')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation" 
                            placeholder="Confirmar contraseña"
                            required 
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 16px; letter-spacing: 3px;"
                        >
                        @error('password_confirmation')
                            <p style="color: #DC2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <button 
                        type="submit" 
                        class="w-full py-3 rounded-full font-bold text-white text-lg transition hover:opacity-90 mb-8 shadow-md"
                        style="background-color: #E97F3A;"
                    >
                        Registrarse
                    </button>
                </form>
            </div>

            <!-- Link a Login -->
            <div class="text-center">
                <p style="color: #8B8B8B;" class="text-sm">
                    ¿Ya tienes cuenta? 
                    <a href="{{ route('login') }}" style="color: #D4A574;" class="font-semibold">Inicia sesión aquí</a>
                </p>
            </div>

            </div>
        </div>
    </div>
</body>
</html>