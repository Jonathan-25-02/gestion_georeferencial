<h1 class="text-3xl font-bold text-center my-6 text-gray-800">Panel de Administración</h1>

<div class="flex justify-center space-x-6 mt-8">
    <button 
        hx-get="{{ url('/admin/zonas_seguras') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Mostrar Zonas Seguras"
        class="px-6 py-4 text-lg bg-green-600 text-white rounded-xl shadow-md hover:bg-green-700 transition flex items-center space-x-2"
    >
        <span>🏠</span>
        <span>Zonas Seguras</span>
    </button>

    <button 
        hx-get="{{ url('/admin/zonas_riesgoz') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Mostrar Zonas de Riesgo"
        class="px-6 py-4 text-lg bg-red-600 text-white rounded-xl shadow-md hover:bg-red-700 transition flex items-center space-x-2"
    >
        <span>🏠</span>
        <span>Zonas de Riesgo</span>
    </button>

    <button 
        hx-get="{{ url('/admin/puntos_encuentro') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Mostrar Puntos de Encuentro"
        class="px-6 py-4 text-lg bg-blue-600 text-white rounded-xl shadow-md hover:bg-blue-700 transition flex items-center space-x-2"
    >
        <span>🏠</span>
        <span>Puntos de Encuentro</span>
    </button>
</div>
