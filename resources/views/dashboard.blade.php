<x-app-layout>
    <x-slot name="title">
        Mi Portal | {{ config('app.name') }}
    </x-slot>

    <div x-data="{ tab: 'agenda', mobileMenu: false, profileOpen: false }" class="min-h-screen p-0 md:p-4 flex justify-center items-center" style="background-color: #003764;">
        <!-- Contenedor principal -->
        <div class="w-full max-w-[1800px] bg-white md:rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden h-screen md:h-[94vh]">
            <!-- Sidebar -->
            <aside class="w-64 lg:w-72 bg-gray-50 border-r border-gray-100 flex-col hidden md:flex h-full z-20">
                <div class="p-8 pb-6 border-b border-gray-100">
                    <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Hospital Universitario" class="w-full h-auto">
                </div>

                <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-4 mb-4">Menú Principal</p>
                    <template x-for="(item, id) in {
                        agenda: { label: 'Mi agenda', icon: 'calendar_month' },
                        BBB: { label: 'BBB', icon: 'stethoscope' },
                        CCC: { label: 'CCC', icon: 'event' },
                        DDD: { label: 'DDD', icon: 'group' },
                        EEE: { label: 'EEE', icon: 'medication' },
                        FFF: { label: 'FFF', icon: 'science' },
                        GGG: { label: 'GGG', icon: 'cloud_upload' },
                        HHH: { label: 'HHH', icon: 'library_books' },
                        III: { label: 'III', icon: 'edit_note' }
                    }">
                        <button @click="tab = id" 
                                :class="tab === id ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent'"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group">
                            <span class="material-symbols-outlined" :class="tab === id ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]'" x-text="item.icon"></span>
                            <span class="font-bold text-sm tracking-wide" x-text="item.label"></span>
                        </button>
                    </template>
                </nav>
                <!-- Footer del Sidebar -->
                <div class="p-6 border-t border-gray-100 text-center">
                    <p class="text-[10px] font-bold text-gray-300 uppercase tracking-tighter">© 2026 Hospital Universitario</p>
                </div>
            </aside>

            <!-- Área principal -->
            <main class="flex-1 flex flex-col h-full bg-white relative">
                <header class="h-20 border-b border-gray-100 flex items-center justify-between px-6 lg:px-10 shrink-0">
                    <!-- Columna de la izquierda -->
                    <div class="flex items-center gap-4 flex-1">
                        <button @click="mobileMenu = !mobileMenu" class="md:hidden text-[#003764]">
                            <span class="material-symbols-outlined text-3xl">menu</span>
                        </button>

                        <div class="hidden lg:block w-full max-w-md">
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                                <input type="text" placeholder="Buscar médico, especialidad..." class="w-full pl-12 pr-4 py-2.5 rounded-xl border-transparent bg-gray-100 focus:bg-white focus:border-[#C7A36E] focus:ring-2 focus:ring-[#C7A36E]/20 transition text-sm font-medium">
                            </div>
                        </div>
                    </div>

                    <!-- Columna de la derecha -->
                    <div class="flex items-center gap-2 md:gap-5">
                        <!-- Botón de notificaciones -->
                        <button class="w-10 h-10 rounded-full flex items-center justify-center text-gray-400 hover:text-[#003764] hover:bg-gray-100 transition relative group">
                            <span class="material-symbols-outlined">notifications</span>
                            <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-red-500 border-2 border-white"></span>
                            <span class="absolute -bottom-8 scale-0 group-hover:scale-100 transition-all bg-gray-800 text-white text-[10px] px-2 py-1 rounded">Notificaciones</span>
                        </button>
                        <div class="h-8 w-[1px] bg-gray-100 hidden sm:block"></div>

                        <!-- Perfil del usuario -->
                        <div class="relative">
                            <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-3 hover:bg-gray-50 p-2 rounded-xl transition">
                                <div class="text-right hidden sm:block">
                                    <p class="text-sm font-bold" style="color: #003764;">{{ Auth::user()->name ?? 'Paciente' }}</p>
                                    <p class="text-[10px] font-bold text-[#C7A36E] uppercase tracking-widest">Paciente</p>
                                </div>
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-md" style="background-color: #003764;">
                                    {{ substr(Auth::user()->name ?? 'P', 0, 1) }}
                                </div>
                                <span class="material-symbols-outlined text-gray-400 transition-transform" :class="profileOpen ? 'rotate-180' : ''">expand_more</span>
                            </button>

                            <!-- Menú desplegable del perfil -->
                            <div x-show="profileOpen" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50" style="display: none;">
                                
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 transition">
                                    <span class="material-symbols-outlined text-gray-400">person</span> Mi Perfil
                                </a>
                                <hr class="my-2 border-gray-50">
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

                <!-- Contenido principal -->
                <div class="flex-1 overflow-y-auto p-6 lg:p-10 bg-white">
                    <!-- Vista 1: Mi Agenda -->
                    <div x-show="tab === 'agenda'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="flex flex-col xl:flex-row gap-10">
                            
                            <div class="flex-1">
                                <div class="mb-8">
                                    <h1 class="font-black text-4xl mb-2" style="color: #003764;">Mi agenda médica</h1>
                                    <p class="text-base font-medium text-gray-500">Bienvenido.</p>
                                </div>

                                <div class="flex flex-wrap gap-4 mb-10">
                                    <button class="flex items-center gap-2 text-white px-6 py-3.5 rounded-2xl font-bold transition hover:scale-[1.02] shadow-xl" style="background-color: #003764;">
                                        <span class="material-symbols-outlined">calendar_add_on</span> Solicitar Nuevo Turno
                                    </button>
                                    <button class="flex items-center gap-2 bg-gray-100 text-[#003764] px-6 py-3.5 rounded-2xl font-bold transition hover:bg-gray-200">
                                        <span class="material-symbols-outlined">add_circle</span> Crear Recordatorio
                                    </button>
                                </div>

                                <div class="bg-white border border-gray-100 rounded-[24px] shadow-sm overflow-hidden">
                                    <div class="bg-gray-50 flex p-5 text-xs font-black uppercase tracking-widest border-b border-gray-100" style="color: #003764;">
                                        <div class="w-1/3">Tipo</div>
                                        <div class="w-1/3">Fecha Programada</div>
                                        <div class="w-1/3 text-center">Estado</div>
                                    </div>
                                    <div class="flex flex-col items-center justify-center py-32 bg-white">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <span class="material-symbols-outlined text-4xl" style="color: #C7A36E;">event_busy</span>
                                        </div>
                                        <p class="text-xl font-bold" style="color: #59595b;">No hay turnos pendientes</p>
                                        <p class="text-sm text-gray-400 mt-1">Tus citas programadas aparecerán en esta lista.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna de novedades -->
                            <div class="w-full xl:w-96 shrink-0">
                                <h2 class="text-sm font-black uppercase tracking-[0.2em] mb-6 pl-2" style="color: #003764;">Novedades</h2>
                                <div class="space-y-5">
                                    <!-- Tarjeta de novedad destacada -->
                                    <div class="group bg-gray-50 p-6 rounded-[24px] border border-gray-100 hover:shadow-lg transition-all cursor-pointer">
                                        <span class="text-[10px] font-bold text-white px-2 py-1 rounded bg-[#C7A36E] mb-3 inline-block">SALUD</span>
                                        <h3 class="font-bold text-base mb-2 group-hover:text-[#C7A36E] transition" style="color: #003764;">Noticia destacada.</h3>
                                        <p class="text-xs text-gray-500 leading-relaxed">AAA.</p>
                                    </div>
                                    <!-- Tarjeta de novedad secundaria -->
                                    <div class="group bg-white p-6 rounded-[24px] border border-gray-100 hover:shadow-lg transition-all cursor-pointer shadow-sm">
                                        <h3 class="font-bold text-base mb-2 group-hover:text-[#C7A36E] transition" style="color: #003764;">Noticia secundaria.</h3>
                                        <p class="text-xs text-gray-500 leading-relaxed">BBB.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Vista 2: -->
                    <div x-show="tab === 'BBB'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">BBB</h1>
                        </div>

                    <!-- Vista 3: -->
                    <div x-show="tab === 'CCC'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">CCC</h1>
                        </div>

                    <!-- Vista 4: -->
                    <div x-show="tab === 'DDD'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">DDD</h1>
                        </div>

                    <!-- Vista 5: -->
                    <div x-show="tab === 'EEE'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">EEE</h1>
                        </div>

                    <!-- Vista 6: -->
                    <div x-show="tab === 'FFF'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">FFF</h1>
                        </div>

                    <!-- Vista 7: -->
                    <div x-show="tab === 'GGG'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">GGG</h1>
                        </div>

                    <!-- Vista 8: -->
                    <div x-show="tab === 'HHH'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">HHH</h1>
                        </div>

                    <!-- Vista 9: -->
                    <div x-show="tab === 'III'" style="display: none;">
                        <h1 class="font-black text-4xl mb-6" style="color: #003764;">III</h1>
                        </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>