<x-app-layout>
    <x-slot name="title">
        Gestión de Especialidades | {{ config('app.name') }}
    </x-slot>

    {{-- Contenedor Principal (Fondo Azul Hospital) --}}
    <div class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        
        {{-- Caja Blanca de Contenido --}}
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">

            {{-- 1. SIDEBAR --}}
            @include('director.partials.sidebar')

            {{-- 2. ÁREA DE CONTENIDO --}}
            <main class="flex-1 flex flex-col h-full bg-white relative">
                
                {{-- 3. HEADER (Donde está el perfil del Director) --}}
                @include('director.partials.header')

                {{-- 4. ESPACIO DE TRABAJO (Con Scroll) --}}
                <div class="p-10 bg-gray-50 flex-1 overflow-y-auto">
                    
                    {{-- Encabezado y Botón de Registro --}}
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
                        <div>
                            <h1 class="font-black text-4xl text-[#003764] mb-2">Especialidades</h1>
                            <p class="text-base font-medium text-gray-500">Administra las áreas médicas y especialidades del hospital.</p>
                        </div>

                        <a href="{{ route('director.create-specialty') }}" class="bg-[#C7A36E] hover:bg-[#b08e5a] text-white px-6 py-3 rounded-xl font-bold text-sm transition-all shadow-lg flex items-center gap-2">
                            <span class="material-symbols-outlined">add_circle</span>
                            Registrar Especialidad
                        </a>
                    </div>

                    {{-- Listado en Tarjetas (Cards) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($specialties as $specialty)
                            <a href="{{ route('director.panel', ['especialidad' => $specialty->id]) }}" 
                            class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm flex items-center justify-between group hover:border-[#C7A36E] hover:shadow-md transition-all">
                                
                                <div class="flex items-center gap-4">
                                    {{-- El icono ahora cambia a azul oscuro al pasar el mouse --}}
                                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-[#003764] group-hover:bg-[#003764] group-hover:text-white transition-all">
                                        <span class="material-symbols-outlined text-3xl">category</span>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-black text-[#003764] text-lg leading-tight uppercase tracking-tight">
                                            {{ $specialty->name }}
                                        </h3>
                                        <p class="text-xs font-bold text-gray-400 mt-1">
                                            <span class="text-blue-500">{{ $specialty->doctors_count }}</span> Médicos en esta área
                                        </p>
                                    </div>
                                </div>

                                {{-- Flecha indicativa de navegación --}}
                                <div class="text-gray-300 group-hover:text-[#C7A36E] transition-colors">
                                    <span class="material-symbols-outlined">arrow_forward_ios</span>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full p-20 text-center bg-white rounded-[32px] border-2 border-dashed border-gray-100">
                                <p class="text-gray-400 font-bold">No hay especialidades registradas aún.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>