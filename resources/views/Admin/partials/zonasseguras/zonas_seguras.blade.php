<h1 class="text-3xl font-bold mb-6 text-green-700">🛡️ Zona Segura</h1>

<div class="mb-6">
    <button
        hx-get="{{ url('/admin/zonas_seguras/nuevo') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Crear nueva zona segura"
        class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition text-lg"
    >
        🏠 Nuevo
    </button>
</div>

<div id="tabla-zonas" class="overflow-x-auto border border-green-300 rounded-lg shadow-inner p-4 bg-green-50">
    @include('Admin.partials.zonasseguras.partials.zs_tabla')
</div>
