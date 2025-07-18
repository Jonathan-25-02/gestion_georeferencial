<form
    hx-post="{{ url('/admin/zonas_seguras/'.$zona->id.'/editar/guardar') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    method="POST"
    class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-6 border border-gray-200"
>
    @csrf

    <h2 class="text-2xl font-bold text-gray-800">Editar Zona Segura</h2>

    <div class="space-y-4">
        <div>
            <label for="nombre" class="block text-sm font-semibold text-gray-700">Nombre</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ $zona->nombre }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <label for="tipo" class="block text-sm font-semibold text-gray-700">Tipo</label>
            <input
                type="text"
                name="tipo"
                id="tipo"
                value="{{ $zona->tipo }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-semibold text-gray-700">Descripción</label>
            <textarea
                name="descripcion"
                id="descripcion"
                rows="4"
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >{{ $zona->descripcion }}</textarea>
        </div>

        <input type="hidden" name="latitud" id="latitud" value="{{ $zona->latitud }}">
        <input type="hidden" name="longitud" id="longitud" value="{{ $zona->longitud }}">

        <div>
            <label for="radio_metros" class="block text-sm font-semibold text-gray-700">Radio (metros)</label>
            <input
                type="number"
                name="radio_metros"
                id="radio_metros"
                value="{{ $zona->radio_metros }}"
                min="1"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>
    </div>

    <div class="mt-6 rounded-lg border border-gray-300 shadow-inner overflow-hidden" style="height: 250px;">
        <div id="seleccionar_punto_usuario" class="h-full w-full"></div>
    </div>

    <div class="flex justify-end space-x-4 pt-4">
        <button
            type="button"
            hx-get="{{ url('/admin/zonas_seguras') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
            class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition"
        >
            Cancelar
        </button>

        <button
            type="submit"
            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
        >
            Guardar Cambios
        </button>
    </div>
</form>
