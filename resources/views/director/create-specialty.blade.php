<x-app-layout>
    <div class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">
            
            @include('director.partials.sidebar')

            <main class="flex-1 flex flex-col h-full bg-white relative">
                @include('director.partials.header')

                <div class="flex-1 overflow-y-auto p-10 bg-gray-50">
                    <div class="max-w-2xl mx-auto">
                        
                        {{-- Navegación --}}
                        <a href="{{ route('director.specialties') }}" class="text-sm font-bold text-[#C7A36E] flex items-center gap-2 mb-6">
                            <span class="material-symbols-outlined">arrow_back</span> Volver a Especialidades
                        </a>

                        <div class="mb-10 text-center">
                            <h1 class="font-black text-4xl text-[#003764] mb-2">Nueva Especialidad</h1>
                            <p class="text-gray-500">Define una nueva área médica para el staff profesional.</p>
                        </div>

                        {{-- Formulario --}}
                        <form action="{{ route('director.store-specialty') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100">
                                <div class="space-y-4">
                                    <label class="block text-xs font-black uppercase text-gray-400 tracking-widest px-2">Nombre de la Especialidad</label>
                                    <input type="text" name="name" required placeholder="Ej: Cardiología Infantil"
                                           class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-[#C7A36E] focus:border-[#C7A36E] font-bold text-[#003764]">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-[#003764] text-white py-4 rounded-2xl font-black shadow-xl hover:bg-[#002d52] transition-all tracking-widest uppercase">
                                Guardar Especialidad
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>