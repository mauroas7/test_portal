<x-app-layout>
    <x-slot name="title">
        Dashboard | Hospital Universitario
    </x-slot>
    <!-- Header -->
    <div class="text-white flex justify-between items-center px-6 py-2 text-sm" style="background-color: #003764;">
        
        <!-- Logo -->
        <div class="flex-1 flex justify-start items-center">
            <img 
                src="{{ asset('img/Logo HU Blanco.svg') }}" 
                alt="Logo Hospital Universitario" 
                class="h-12 w-auto" 
            >
        </div>
        
        <!-- Buscador -->
        <div class="flex-1 flex justify-center">
            <div class="w-full max-w-md">
                <input type="text" placeholder="Buscar médico" class="w-full text-black px-3 py-1 rounded focus:ring-2" style="outline-color: #C7A36E;">
            </div>
        </div>
        
        <!-- Perfil y notificaciones -->
        <div class="flex-1 flex justify-end items-center gap-6">
            <button class="hover:text-[#C7A36E] transition relative" title="Notificaciones">
                <span class="material-symbols-outlined" style="font-size: 24px;">notifications</span>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-[#003764]"></span>
            </button>

            <!-- Menú de Usuario -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-1 hover:text-[#C7A36E] transition font-semibold focus:outline-none">
                    {{ Auth::user()->name }}
                    <span class="material-symbols-outlined" style="font-size: 20px;">arrow_drop_down</span>
                </button>

                <!-- Caja del menú desplegable -->
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border"
                    style="border-color: #C7A36E; display: none;"
                >
                    <!-- Título del menú -->
                    <div class="px-4 py-2 text-xs text-gray-400 border-b">
                        Gestionar cuenta
                    </div>

                    <!-- Enlace a Mi Perfil -->
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-50 transition" style="color: #59595b;">
                        Mi Perfil
                    </a>

                    <!-- Cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-red-50 transition text-red-600 font-semibold border-t mt-1 pt-2">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Navegacion -->
    <div class="bg-white border-b flex justify-start md:justify-center overflow-x-auto text-sm shadow-sm w-full">

        <div class="shrink-0 text-white flex flex-col items-center justify-center px-6 py-3 cursor-pointer transition" style="background-color: #003764;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px;">calendar_month</span>
            <span class="font-semibold tracking-wide">1</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">stethoscope</span>
            <span class="font-semibold tracking-wide">2</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">event</span>
            <span class="font-semibold tracking-wide">3</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">group</span>
            <span class="font-semibold tracking-wide">4</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">medication</span>
            <span class="font-semibold tracking-wide">5</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">science</span>
            <span class="font-semibold tracking-wide">6</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">cloud_upload</span>
            <span class="font-semibold tracking-wide">7</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">library_books</span>
            <span class="font-semibold tracking-wide">8</span>
        </div>

        <div class="shrink-0 hover:bg-gray-50 flex flex-col items-center justify-center px-6 py-3 border-r cursor-pointer transition" style="color: #59595b;">
            <span class="material-symbols-outlined mb-1" style="font-size: 32px; color: #C7A36E;">edit_note</span>
            <span class="font-semibold tracking-wide">9</span>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="max-w-7xl mx-auto flex gap-8 p-6 mt-4">
        
        <!-- Columna de la izquierda -->
        <div class="w-3/4">
            <h1 class="font-black text-3xl mb-1" style="color: #003764;">Mi agenda médica</h1>
            <p class="text-sm mb-6 font-medium" style="color: #59595b;">Tus temas médicos personales y familiares</p>

            <!-- Botones -->
            <div class="flex gap-2 mb-8">
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm hover:bg-gray-300 font-semibold transition">1</button>
                <button class="text-white px-4 py-2 rounded text-sm hover:opacity-90 font-semibold transition" style="background-color: #003764;">2</button>
                <button class="text-white px-4 py-2 rounded text-sm hover:opacity-90 font-semibold transition" style="background-color: #003764;">3</button>
                <button class="text-white px-4 py-2 rounded text-sm hover:opacity-90 font-semibold transition" style="background-color: #003764;">4</button>
            </div>

            <!-- Tabla de expedientes -->
            <h2 class="text-2xl font-semibold mb-4" style="color: #59595b;">Mis pendientes</h2>
            <div class="bg-white border rounded shadow-sm">
                
                <!-- Cabecera de la tabla -->
                <div class="bg-gray-50 flex p-3 text-sm font-bold border-b" style="color: #003764;">
                    <div class="w-10 text-center"><input type="checkbox" style="accent-color: #003764;"></div>
                    <div class="w-1/4">Tipo</div>
                    <div class="w-1/4">Pendiente</div>
                    <div class="w-1/4">Fecha</div>
                    <div class="w-1/4">Estado</div>
                </div>
                
                <!-- Estado vacío -->
                <div class="flex flex-col items-center justify-center py-16" style="color: #C7A36E;">
                    <span class="material-symbols-outlined mb-4" style="font-size: 64px; opacity: 0.5;">inbox</span>
                    <p class="text-xl font-medium" style="color: #59595b;">No hay datos para mostrar</p>
                </div>
            </div>
        </div>

        <!-- Columna de la derecha -->
        <div class="w-1/4">
            
            <!-- Banner -->
            <div class="text-center mb-8 border-b pb-4">
                <span class="text-2xl font-black tracking-widest" style="color: #003764;">Hospital</span>
                <p class="text-xs font-semibold tracking-widest" style="color: #C7A36E;">Universitario</p>
            </div>

            <!-- Novedades -->
            <h2 class="text-2xl font-semibold mb-4" style="color: #59595b;">Novedades</h2>
            <div class="space-y-4">
                
                <div class="bg-white border-l-4 p-4 shadow-sm hover:shadow-md transition cursor-pointer" style="border-left-color: #C7A36E;">
                    <h3 class="font-bold text-sm mb-2" style="color: #003764;">111111</h3>
                    <p class="text-xs" style="color: #59595b;">1111</p>
                </div>

                <div class="bg-white border-l-4 p-4 shadow-sm hover:shadow-md transition cursor-pointer" style="border-left-color: #C7A36E;">
                    <h3 class="font-bold text-sm mb-2" style="color: #003764;">2222222</h3>
                    <p class="text-xs" style="color: #59595b;">22222</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>