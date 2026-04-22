<x-app-layout>
    <x-slot name="title">
        Padrón de Pacientes | {{ config('app.name') }}
    </x-slot>

    {{-- Contenedor Principal (Fondo Azul) --}}
    <div class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        
        {{-- Caja Blanca de Contenido --}}
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">

            {{-- 1. SIDEBAR --}}
            @include('director.partials.sidebar')

            {{-- 2. ÁREA DE CONTENIDO --}}
            <main class="flex-1 flex flex-col h-full bg-white relative">
                
                {{-- 3. HEADER (Donde está tu perfil) --}}
                @include('director.partials.header')

                {{-- 4. ESPACIO DE TRABAJO (Con Scroll) --}}
                <div class="p-10 bg-gray-50 flex-1 overflow-y-auto">
                    
                    {{-- Encabezado de Sección y Buscador --}}
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
                        <div>
                            <h1 class="font-black text-4xl text-[#003764] mb-2">Padrón de Pacientes</h1>
                            <p class="text-base font-medium text-gray-500">Consulta de identidad y contacto de usuarios.</p>
                        </div>

                        {{-- Formulario de Búsqueda --}}
                        <form action="{{ route('director.patients') }}" method="GET" class="relative w-full md:w-80">
                            <input type="text" name="buscar" value="{{ $buscar ?? '' }}" placeholder="DNI o Apellido..." 
                                   class="w-full pl-12 pr-4 py-3 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-[#C7A36E] text-sm font-medium bg-white">
                            <span class="material-symbols-outlined absolute left-4 top-3 text-gray-400">search</span>
                        </form>
                    </div>

                    {{-- Tabla de Datos --}}
                    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50 text-[#003764] text-xs font-black uppercase tracking-widest">
                                <tr>
                                    <th class="p-6 border-b">DNI</th>
                                    <th class="p-6 border-b">Apellido y Nombre</th>
                                    <th class="p-6 border-b">Contacto</th>
                                    <th class="p-6 border-b text-center">Registro</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($pacientes as $paciente)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-6 font-mono text-sm text-gray-500">
                                        {{ $paciente->dni }}
                                    </td>
                                    <td class="p-6">
                                        <div class="flex flex-col">
                                            <span class="font-black text-[#003764] uppercase text-sm">{{ $paciente->user->last_name }}</span>
                                            <span class="text-sm text-gray-600">{{ $paciente->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 text-sm">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex items-center gap-2 text-gray-700">
                                                <span class="material-symbols-outlined text-xs">call</span>
                                                <span class="font-bold">{{ $paciente->phone }}</span>
                                            </div>
                                            <div class="flex items-center gap-2 text-gray-400">
                                                <span class="material-symbols-outlined text-xs">mail</span>
                                                <span>{{ $paciente->user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-6 text-center text-xs text-gray-400 font-medium">
                                        {{ $paciente->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-20 text-center text-gray-400 font-medium">
                                        No se encontraron pacientes registrados.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Paginación --}}
                        @if($pacientes->hasPages())
                            <div class="p-6 bg-gray-50 border-t border-gray-100">
                                {{ $pacientes->appends(['buscar' => $buscar ?? ''])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>