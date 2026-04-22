<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Registro | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_color.png') }}?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="background-color: #003764;">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 lg:py-12">
        <div class="w-full max-w-5xl bg-white shadow-2xl flex flex-col md:flex-row overflow-hidden" style="border-radius: 24px;">
            
            <!-- Panel izquierdo -->
            <div class="hidden md:flex md:w-4/12 bg-gray-50 flex-col justify-between p-10 relative">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#C7A36E] opacity-10 rounded-bl-full"></div>

                <div>
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo Hospital Universitario" class="w-40 h-auto mb-10">
                    
                    <h2 class="text-3xl font-black mb-4 leading-tight" style="color: #003764;">
                        A<br>a.
                    </h2>
                    <p class="text-sm font-medium text-gray-500 leading-relaxed">
                        Descripción.
                    </p>
                </div>
                
                <div class="space-y-4">
                    <div style="height: 4px; width: 40px; background-color: #C7A36E; border-radius: 2px;"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                        Registro de Pacientes
                    </p>
                </div>
            </div>

            <!-- Panel derecho -->
            <div class="w-full md:w-8/12 p-8 sm:p-12 flex flex-col justify-center bg-white">
                <div class="md:hidden flex justify-center mb-8">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo" class="w-40 h-auto">
                </div>

                <div class="mb-10">
                    <h1 class="font-black text-3xl mb-2" style="color: #003764;">Crear Cuenta</h1>
                    <p class="font-medium" style="color: #59595b; font-size: 14px;">
                        Completá tus datos para el alta de paciente.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="space-y-5">
                        <!-- Identidad del usuario -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Nombre/s</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ej: Juan Pablo" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium" style="font-size: 14px;">
                                @error('name') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Apellido/s</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Ej: Pérez" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium" style="font-size: 14px;">
                                @error('last_name') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Contacto -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">DNI</label>
                                <input type="text" name="dni" value="{{ old('dni') }}" placeholder="Sin puntos" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium" style="font-size: 14px;">
                                @error('dni') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Celular</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="261..." required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium" style="font-size: 14px;">
                                @error('phone') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="paciente@ejemplo.com" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium" style="font-size: 14px;">
                            @error('email') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Seguridad -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Contraseña</label>
                                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium tracking-widest" placeholder="••••••••" style="font-size: 14px;">
                                @error('password') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider mb-2 ml-1" style="color: #003764;">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition font-medium tracking-widest" placeholder="••••••••" style="font-size: 14px;">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-10 py-4 rounded-xl font-bold text-white text-lg transition-all hover:bg-blue-900 shadow-md hover:shadow-xl active:scale-[0.98]" style="background-color: #003764;">
                        Crear mi cuenta
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p style="color: #59595b;" class="text-sm font-medium">
                        ¿Ya tenés una cuenta registrada? 
                        <a href="{{ route('login') }}" class="font-bold hover:underline" style="color: #003764;">Iniciá sesión aquí</a>
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