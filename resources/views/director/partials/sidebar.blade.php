<aside class="w-64 lg:w-72 bg-gray-50 border-r border-gray-100 flex-col hidden md:flex h-full z-20">
    <div class="p-8 pb-6 border-b border-gray-100">
        <img src="{{ asset('img/Logo HU Uso Diario.svg') }}" alt="Hospital Universitario" class="w-full h-auto">
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-4 mb-4">Gestión Administrativa</p>
        
        {{-- BOTÓN DASHBOARD --}}
        <a href="{{ route('director.dashboard') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group {{ request()->routeIs('director.dashboard') ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent' }}">
            <span class="material-symbols-outlined {{ request()->routeIs('director.dashboard') ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]' }}">dashboard</span>
            <span class="font-bold text-sm tracking-wide">Panel Principal</span>
        </a>

        {{-- EQUIPO MÉDICO --}}
        <a href="{{ route('director.panel') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group {{ request()->routeIs('director.panel') ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent' }}">
            <span class="material-symbols-outlined {{ request()->routeIs('director.panel') ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]' }}">badge</span>
            <span class="font-bold text-sm tracking-wide">Equipo Médico</span>
        </a>

        {{-- PACIENTES --}}
        <a href="{{ route('director.patients') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group {{ request()->routeIs('director.patients') ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent' }}">
            <span class="material-symbols-outlined {{ request()->routeIs('director.patients') ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]' }}">group</span>
            <span class="font-bold text-sm tracking-wide">Padrón de Pacientes</span>
        </a>

        {{-- ESPECIALIDADES --}}
        <a href="{{ route('director.specialties') }}" 
        class="w-full flex items-center gap-3 px-4 py-3 rounded-r-xl transition-all text-left group {{ request()->routeIs('director.specialties') ? 'bg-white text-[#003764] shadow-sm border-l-4 border-[#C7A36E]' : 'text-gray-500 hover:bg-gray-100 border-l-4 border-transparent' }}">
            <span class="material-symbols-outlined {{ request()->routeIs('director.specialties') ? 'text-[#C7A36E]' : 'text-gray-400 group-hover:text-[#003764]' }}">category</span>
            <span class="font-bold text-sm tracking-wide">Especialidades</span>
        </a>
    </nav>
</aside>