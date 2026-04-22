<x-app-layout>
    <div class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">
            
            @include('director.partials.sidebar')

            <main class="flex-1 flex flex-col h-full bg-white relative">
                @include('director.partials.header')

                <div class="p-10 bg-gray-50 flex-1 overflow-y-auto">
                    <h1 class="font-black text-4xl text-[#003764] mb-8">Estado del Hospital</h1>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Médicos --}}
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-5">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                                <span class="material-symbols-outlined">badge</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Equipo Médico</p>
                                <h3 class="text-2xl font-black text-[#003764]">{{ $stats['total_medicos'] }}</h3>
                            </div>
                        </div>

                        {{-- Pacientes --}}
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-5">
                            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-600">
                                <span class="material-symbols-outlined">group</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Pacientes Totales</p>
                                <h3 class="text-2xl font-black text-[#003764]">{{ $stats['total_pacientes'] }}</h3>
                            </div>
                        </div>

                        {{-- Especialidades --}}
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-5">
                            <div class="w-12 h-12 bg-amber-100 rounded-2xl flex items-center justify-center text-amber-600">
                                <span class="material-symbols-outlined">category</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Especialidades</p>
                                <h3 class="text-2xl font-black text-[#003764]">{{ $stats['total_especialidades'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>