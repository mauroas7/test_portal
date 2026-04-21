<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Consultorio MOVIL - Ingreso</title>
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
                Ingreso pacientes
            </h1>

            <!-- Sección de Subtítulo -->
            <p class="text-center" style="color: #8B8B8B; font-size: 14px; margin-bottom: 28px;">
                Si eres parte de un Equipo médico, ingresa <a href="#" style="color: #D4A574;" class="font-semibold">aquí</a>
            </p>

            <!-- Formulario -->
            <div style="border: 1px solid #D4A574; border-radius: 8px; padding: 24px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Poner mail  -->
                    <div class="mb-4 relative">
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="test@gmail.com"
                            required 
                            autofocus 
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 14px;"
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
                            class="w-full px-5 py-4 rounded-lg border-0 focus:outline-none focus:ring-0 transition"
                            style="background-color: #F5F0EB; color: #4A4A4A; font-size: 16px; letter-spacing: 3px;"
                        >
                    </div>

                    <!-- Link por contraseña olvidada -->
                    <div class="text-right mb-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color: #D4A574;" class="text-sm font-medium">
                                ¿Has olvidado la contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Recordarme -->
                    <div class="mb-4 flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            name="remember"
                            class="rounded w-4 h-4 cursor-pointer"
                            style="accent-color: #D4A574; border-color: #D0D0D0;"
                        >
                        <label for="remember_me" class="ms-3 text-sm" style="color: #4A4A4A;">
                            Recordarme
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
                        class="w-full py-3 rounded-full font-bold text-white text-lg transition hover:opacity-90 mb-8 shadow-md"
                        style="background-color: #E97F3A;"
                    >
                        Ingresar
                    </button>
                </form>
            </div>

            <br>

            <!-- Links -->
            <div class="space-y-4 text-center">
                <p style="color: #8B8B8B;" class="text-sm">
                    ¿Quieres usar ConsultorioMOVIL? 
                    <a href="{{ route('register') }}" style="color: #D4A574;" class="font-semibold">Click aquí</a>
                </p>
                <p style="color: #8B8B8B;" class="text-sm">
                    Conozca ConsultorioMOVIL haciendo 
                    <a href="#" style="color: #D4A574;" class="font-semibold">Click aquí</a>
                </p>
            </div>

            </div>
        </div>
    </div>
</body>
</html>
