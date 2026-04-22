<x-app-layout>
    <div class="p-10">
        <h1 class="text-2xl font-black text-[#003764]">Panel del Médico</h1>
        <p class="text-gray-500">Bienvenido, {{ Auth::user()->name }}. Próximamente aquí verás tu agenda.</p>
    </div>
</x-app-layout>