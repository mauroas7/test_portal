<x-app-layout>
    <x-slot name="title">
        Panel de Dirección | {{ config('app.name') }}
    </x-slot>

    <div x-data="{ tab: 'inicio', mobileMenu: false, profileOpen: false }" class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">

            {{-- 1. SIDEBAR --}}
            <aside class="w-64 lg:w-72 bg-gray-50 border-r border-gray-100 flex-col hidden md:flex h-full z-20">
                <div class="p-8 pb-6 border-b border-gray-100">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Hospital Universitario" class="w-full h-auto">
                </div>

                <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-4 mb-4">Gestión Administrativa</p>
                    
                    <button @click="tab = 'inicio'" 
                            :class="tab === 'inicio' ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group">
                        <span class="material-symbols-outlined" :class="tab === 'inicio' ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]'">dashboard</span>
                        <span class="font-bold text-sm tracking-wide">Panel Principal</span>
                    </button>

                    <button @click="tab = 'personal'" 
                            :class="tab === 'personal' ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group">
                        <span class="material-symbols-outlined" :class="tab === 'personal' ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]'">badge</span>
                        <span class="font-bold text-sm tracking-wide">Equipo Médico</span>
                    </button>
                </nav>

                <div class="p-6 border-t border-gray-100 text-center">
                    <p class="text-[10px] font-bold text-gray-300 uppercase tracking-tighter">Área de Dirección</p>
                </div>
            </aside>

            {{-- 2. ÁREA PRINCIPAL --}}
            <main class="flex-1 flex flex-col h-full bg-white relative">
                
                <header class="h-20 border-b border-gray-100 flex items-center justify-between px-6 lg:px-10 shrink-0">
                    <div class="flex items-center gap-4">
                        <button @click="mobileMenu = !mobileMenu" class="md:hidden text-[#003764]">
                            <span class="material-symbols-outlined text-3xl">menu</span>
                        </button>
                        <h2 class="hidden md:block font-bold text-sm text-gray-400 uppercase tracking-[0.2em]">Sistema de Gestión Interna</h2>
                    </div>

                    <div class="flex items-center gap-5">
                        <div class="relative">
                            <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-3 hover:bg-gray-50 p-2 rounded-xl transition">
                                <div class="text-right hidden sm:block">
                                    <p class="text-sm font-bold" style="color: #003764;">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] font-bold text-red-600 uppercase tracking-widest">Director</p>
                                </div>
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-md bg-red-600">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </button>
                            <div x-show="profileOpen" class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-500 hover:bg-red-50 transition font-bold">
                                        <span class="material-symbols-outlined">logout</span> Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="flex-1 overflow-y-auto p-6 lg:p-10" style="background-color: #f8fafc;">
                    
                    {{-- TAB INICIO --}}
                    <div x-show="tab === 'inicio'" x-transition>
                        <div class="mb-10">
                            <h1 class="font-black text-4xl mb-2" style="color: #003764;">Panel de Dirección</h1>
                            <p class="text-base font-medium text-gray-500">Bienvenido. Desde aquí puedes gestionar los recursos humanos del hospital.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                            <a href="{{ route('director.create-doctor') }}" class="group bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm hover:shadow-xl transition-all hover:-translate-y-1">
                                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-[#003764] transition-colors">
                                    <span class="material-symbols-outlined text-[#003764] group-hover:text-white transition-colors text-3xl">person_add</span>
                                </div>
                                <h3 class="font-black text-xl mb-2" style="color: #003764;">Registrar Médico</h3>
                                <p class="text-sm text-gray-500 leading-relaxed">Dar de alta a un nuevo profesional y asignarle credenciales de acceso.</p>
                            </a>
                        </div>
                    </div>

                    {{-- TAB EQUIPO MÉDICO --}}
                    <div x-show="tab === 'personal'" x-transition style="display: none;">
                        <div class="mb-10">
                            <h1 class="font-black text-4xl mb-2" style="color: #003764;">Equipo Médico</h1>
                            <p class="text-base font-medium text-gray-500">Listado de profesionales autorizados en el sistema.</p>
                        </div>

                        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-50 text-[#003764] text-xs font-black uppercase tracking-widest">
                                    <tr>
                                        <th class="p-5 border-b">Nombre</th>
                                        <th class="p-5 border-b">Matrícula</th>
                                        <th class="p-5 border-b">Especialidad</th>
                                        <th class="p-5 border-b">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($medicos as $medico)
                                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                            <td class="p-5 font-bold text-[#003764]">
                                                {{-- ACCESO A TRAVÉS DE LA RELACIÓN USER --}}
                                                {{ $medico->user->name }} {{ $medico->last_name }}
                                            </td>
                                            <td class="p-5">
                                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold">
                                                    {{ $medico->matricula }}
                                                </span>
                                            </td>
                                            
                                            <td class="p-5 font-medium text-gray-700">
                                                {{ $medico->specialty->name ?? 'Sin asignar' }}
                                            </td>

                                            <td class="p-5 text-gray-500">
                                                {{-- EL EMAIL ESTÁ EN LA TABLA USERS --}}
                                                {{ $medico->user->email }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="p-10 text-center text-gray-400">
                                                No hay médicos registrados.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>