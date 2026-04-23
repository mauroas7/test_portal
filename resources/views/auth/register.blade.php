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

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 lg:py-12">
        <div class="w-full max-w-5xl bg-white shadow-[0_20px_60px_rgba(0,0,0,0.1)] flex flex-col md:flex-row overflow-hidden" style="border-radius: 32px;">
            
            <div class="hidden md:flex md:w-5/12 flex-col justify-between p-12 relative overflow-hidden" style="background-color: #003764;">
                {{-- Círculo decorativo en dorado --}}
                <div class="absolute top-[-10%] right-[-10%] w-64 h-64 bg-[#C7A36E] opacity-10 rounded-full"></div>

                <div class="relative z-10">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo Hospital Universitario" class="w-48 h-auto mb-12 brightness-0 invert">
                    
                    <h2 class="text-4xl font-black mb-6 leading-tight text-white">
                        Comience su <br><span style="color: #C7A36E;">atención aquí.</span>
                    </h2>
                    <p class="text-sm font-medium text-blue-100 leading-relaxed max-w-xs">
                        Cree su cuenta para acceder a la cartilla médica, solicitar turnos online y gestionar su historial de salud de forma segura.
                    </p>
                </div>
                
                <div class="relative z-10 space-y-4">
                    <div style="height: 4px; width: 40px; background-color: #C7A36E; border-radius: 2px;"></div>
                    <p class="text-[10px] font-black text-blue-200 uppercase tracking-[0.3em]">
                        Registro de Pacientes
                    </p>
                </div>
            </div>

            <div class="w-full md:w-7/12 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white relative">
                <div class="md:hidden flex justify-center mb-10">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Logo" class="w-40 h-auto">
                </div>

                <div class="mb-10">
                    <h1 class="font-black text-4xl mb-3" style="color: #003764;">Crear Cuenta</h1>
                    <p class="font-medium text-gray-500" style="font-size: 15px;">
                        Complete el formulario para darse de alta en el sistema.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Nombre/s</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ingrese su nombre" required 
                                    oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"
                                    class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]" style="font-size: 14px;">
                                @error('name') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Apellido/s</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Ingrese su apellido" required 
                                    oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"
                                    class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]" style="font-size: 14px;">
                                @error('last_name') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Número de Documento (DNI)</label>
                                <input type="text" name="dni" value="{{ old('dni') }}" placeholder="Sin puntos" required 
                                    inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]" style="font-size: 14px;">
                                @error('dni') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Celular</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="2615555555" required 
                                    inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]" style="font-size: 14px;">
                                @error('phone') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="paciente@ejemplo.com" required 
                                   class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold text-[#003764]" style="font-size: 14px;">
                            @error('email') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Contraseña</label>
                                <input type="password" name="password" required placeholder="••••••••" 
                                       class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold tracking-widest text-[#003764]" style="font-size: 14px;">
                                @error('password') <p class="text-red-600 text-[10px] mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-[0.2em] mb-2 ml-1" style="color: #59595b;">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" required placeholder="••••••••" 
                                       class="w-full px-5 py-3 rounded-2xl border-none bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#C7A36E]/30 transition font-bold tracking-widest text-[#003764]" style="font-size: 14px;">
                            </div>
                        </div>
                    </div>

                    <button type="submit" 
                            class="w-full mt-10 py-5 rounded-2xl font-black text-white text-sm uppercase tracking-widest transition-all hover:brightness-110 shadow-lg hover:shadow-2xl active:scale-[0.98]"
                            style="background-color: #003764;">
                        Crear mi cuenta
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p style="color: #59595b;" class="text-sm font-bold">
                        ¿Ya tiene una cuenta? 
                        <a href="{{ route('login') }}" style="color: #003764;" class="font-black hover:underline">Iniciar sesión</a>
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