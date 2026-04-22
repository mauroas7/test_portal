{{-- resources/views/director/partials/header.blade.php --}}
<header class="h-20 border-b border-gray-100 flex items-center justify-between px-6 lg:px-10 shrink-0 bg-white">
    <div class="flex items-center gap-4">
        <h2 class="hidden md:block font-black text-xs text-gray-400 uppercase tracking-[0.3em]">
            Sistema de Gestión Interna
        </h2>
    </div>

    <div class="flex items-center gap-5">
        {{-- BOTÓN DE PERFIL CON DROPDOWN --}}
        <div class="relative" x-data="{ profileOpen: false }">
            <button @click="profileOpen = !profileOpen" 
                    @click.away="profileOpen = false" 
                    class="flex items-center gap-3 hover:bg-gray-50 p-2 rounded-2xl transition-all duration-300 group">
                
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-black tracking-tight" style="color: #003764;">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-[9px] font-black uppercase tracking-[0.15em]" style="color: #C7A36E;">
                        Director General
                    </p>
                </div>

                {{-- Avatar con borde sutil --}}
                <div class="w-11 h-11 rounded-full flex items-center justify-center text-white font-black shadow-lg transition-transform group-hover:scale-105" 
                     style="background-color: #C7A36E; border: 2px solid #fdf8f0;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </button>
            
            {{-- MENÚ DESPLEGABLE --}}
            <div x-show="profileOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                 class="absolute right-0 mt-3 w-64 bg-white rounded-[24px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-gray-50 py-3 z-50 overflow-hidden">
                
                <div class="px-5 py-3 border-b border-gray-50 mb-2">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Cuenta</p>
                    <p class="text-sm font-bold text-[#003764] truncate">{{ Auth::user()->email }}</p>
                </div>

                {{-- Opción: Mi Perfil (Placeholder) --}}
                <a href="#" class="flex items-center gap-3 px-5 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 hover:text-[#003764] transition">
                    <span class="material-symbols-outlined text-lg">person</span> Mi Perfil
                </a>

                <div class="h-px bg-gray-50 my-2"></div>

                {{-- Opción: Cerrar Sesión --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-sm font-black text-red-500 hover:bg-red-50 transition">
                        <span class="material-symbols-outlined text-lg">logout</span> Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>