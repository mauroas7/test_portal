<x-app-layout>
    <x-slot name="title">Alta de Profesional | {{ config('app.name') }}</x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-6">
            
            {{-- Encabezado --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-black text-[#003764]">Registrar Nuevo Médico</h1>
                    <p class="text-gray-500 font-medium">Asignación de credenciales institucionales.</p>
                </div>
                <a href="{{ route('director.panel') }}" class="text-sm font-bold text-gray-400 hover:text-[#003764] transition flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Volver al Panel
                </a>
            </div>

            {{-- Tarjeta del Formulario --}}
            <div class="bg-white rounded-[32px] shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-10">
                    <form action="{{ route('director.store-doctor') }}" method="POST">
                        @csrf
                        
                        {{-- Fila 1: Nombre y Apellido --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Nombre</label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/10 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Apellido</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/10 transition">
                            </div>
                        </div>

                        {{-- Fila 2: Matrícula y Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">N° Matrícula</label>
                                <input type="text" name="matricula" value="{{ old('matricula') }}" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/10 transition" placeholder="MP-XXXX">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Email Institucional</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/10 transition">
                            </div>
                        </div>

                        {{-- Fila 3: Especialidad (IMPLEMENTACIÓN PROFESIONAL) --}}
                        <div class="mb-6">
                            <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Especialidad Médica</label>
                            <select name="specialty_id" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/10 transition appearance-none cursor-pointer">
                                <option value="" disabled selected>Seleccione la especialidad del profesional...</option>
                                @foreach($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" {{ old('specialty_id') == $specialty->id ? 'selected' : '' }}>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Fila 4: Contraseñas --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Contraseña Temporal</label>
                                <input type="password" name="password" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-[#003764] mb-2 ml-1">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" required class="w-full px-5 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition">
                            </div>
                        </div>

                        {{-- Errores de validación --}}
                        @if ($errors->any())
                            <div class="mb-8 p-5 bg-red-50 border-l-4 border-red-500 rounded-r-xl">
                                <div class="flex items-center gap-2 mb-2 text-red-700">
                                    <span class="material-symbols-outlined text-sm">warning</span>
                                    <p class="font-bold text-sm uppercase tracking-widest">Revisar los siguientes datos:</p>
                                </div>
                                <ul class="list-disc list-inside text-sm text-red-600 font-medium ml-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="w-full py-4 bg-[#003764] text-white rounded-2xl font-bold text-lg shadow-lg hover:scale-[1.02] transition active:scale-[0.98]">
                            Dar de Alta Profesional
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>