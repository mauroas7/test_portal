<x-app-layout>
    <x-slot name="title">
        Equipo Médico | {{ config('app.name') }}
    </x-slot>

    <div class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">

            @include('director.partials.sidebar')

            <main class="flex-1 flex flex-col h-full bg-white relative">
                
                @include('director.partials.header')

                <div class="flex-1 overflow-y-auto p-6 lg:p-10" style="background-color: #f8fafc;">
                    
                    {{-- Encabezado y Buscador --}}
                    <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                        <div>
                            <h1 class="font-black text-4xl mb-2" style="color: #003764;">Equipo Médico</h1>
                            <p class="text-base font-medium text-gray-500">Gestión de profesionales, matrículas y especialidades.</p>
                        </div>
                        
                        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                            {{-- Buscador --}}
                            <form action="{{ route('director.panel') }}" method="GET" class="relative">
                                <input type="text" name="buscar" value="{{ $buscar ?? '' }}" placeholder="Nombre, Matrícula o Especialidad..." 
                                       class="w-full md:w-80 pl-12 pr-4 py-3 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-[#C7A36E] text-sm font-medium bg-white">
                                <span class="material-symbols-outlined absolute left-4 top-3 text-gray-400">search</span>
                            </form>

                            <a href="{{ route('director.create-doctor') }}" class="bg-[#C7A36E] hover:bg-[#b08e5a] text-white px-6 py-3 rounded-xl font-bold text-sm transition-all shadow-lg flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">person_add</span>
                                Registrar Médico
                            </a>
                        </div>
                    </div>

                    {{-- Si hay un filtro de especialidad activo, mostramos esta barra --}}
                    @if(request('especialidad'))
                        <div class="mb-6 flex items-center gap-3">
                            <div class="bg-blue-50 text-[#003764] px-4 py-2 rounded-full text-[10px] font-black flex items-center gap-2 border border-blue-100 uppercase tracking-widest">
                                <span class="material-symbols-outlined text-sm">filter_alt</span>
                                Filtrando por Especialidad
                                <a href="{{ route('director.panel') }}" class="ml-2 hover:text-red-500 transition-colors" title="Quitar filtro">
                                    <span class="material-symbols-outlined text-sm">cancel</span>
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Tabla --}}
                    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50 text-[#003764] text-xs font-black uppercase tracking-widest">
                                <tr>
                                    <th class="p-6 border-b">Profesional</th>
                                    <th class="p-6 border-b">Especialidad</th>
                                    <th class="p-6 border-b">Matrícula</th>
                                    <th class="p-6 border-b">Contacto</th>
                                    <th class="p-6 border-b text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($medicos as $medico)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-6">
                                        <div class="flex flex-col">
                                            <span class="font-black text-[#003764] uppercase text-sm">{{ $medico->user->last_name }}</span>
                                            <span class="text-sm text-gray-600">{{ $medico->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6">
                                        <span class="px-3 py-1 bg-blue-50 text-[#003764] rounded-lg text-[10px] font-black uppercase border border-blue-100">
                                            {{ $medico->specialty->name }}
                                        </span>
                                    </td>
                                    <td class="p-6 font-mono text-sm text-gray-500">{{ $medico->matricula }}</td>
                                    <td class="p-6">
                                        <div class="flex flex-col text-sm">
                                            <span class="font-bold text-gray-700">{{ $medico->user->email }}</span>
                                            <span class="text-[10px] text-gray-400 uppercase tracking-tighter">Alta: {{ $medico->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 text-center">
                                        <div class="flex items-center justify-center gap-4">
                                            
                                            {{-- 1. Opción: Editar --}}
                                            {{-- Usamos un color azul oscuro para indicar edición --}}
                                            <button class="text-[#003764] hover:text-[#C7A36E] transition-colors cursor-default" title="Editar datos (Vista previa)">
                                                <span class="material-symbols-outlined text-xl">edit_square</span>
                                            </button>

                                            {{-- 2. Opción: Estado (Activo/Inactivo) --}}
                                            {{-- Usamos un color gris/verde suave para representar el interruptor --}}
                                            <button class="text-green-500 opacity-60 cursor-default" title="Cambiar Estado (Vista previa)">
                                                <span class="material-symbols-outlined text-2xl">toggle_on</span>
                                            </button>

                                            {{-- 3. Opción: Password (Reset) --}}
                                            {{-- Usamos un color gris para representar seguridad --}}
                                            <button class="text-gray-400 cursor-default" title="Resetear Contraseña (Vista previa)">
                                                <span class="material-symbols-outlined text-xl">lock_reset</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-20 text-center text-gray-400 font-medium">
                                        No se encontraron profesionales con ese criterio.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Paginación --}}
                        @if($medicos->hasPages())
                            <div class="p-6 bg-gray-50 border-t border-gray-100">
                                {{ $medicos->appends(['buscar' => $buscar ?? ''])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>