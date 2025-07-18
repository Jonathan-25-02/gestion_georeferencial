<form
    hx-post="{{ url('/admin/puntos_encuentro/'.$punto->id.'/editar/guardar') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    method="POST"
    class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-6"
>
    @csrf

    <h2 class="text-2xl font-bold text-gray-800">Editar Punto de Encuentro</h2>

    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input
            type="text"
            name="nombre"
            id="nombre"
            value="{{ $punto->nombre }}"
            required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
    </div>

    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea
            name="descripcion"
            id="descripcion"
            rows="3"
            required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >{{ $punto->descripcion }}</textarea>
    </div>

    <input type="hidden" name="latitud" id="latitud" value="{{ $punto->latitud }}" />
    <input type="hidden" name="longitud" id="longitud" value="{{ $punto->longitud }}" />

    <div class="relative h-64 w-full border border-gray-300 rounded-md overflow-hidden">
        <div id="seleccionar_punto_usuario" class="h-full w-full"></div>
    </div>

    <div class="flex items-center justify-end space-x-4">
        <button
            type="button"
            hx-get="{{ url('/admin/puntos_encuentro') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition"
        >
            Cancelar
        </button>
        <button
            type="submit"
            class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
        >
            Guardar Cambios
        </button>
    </div>
</form>
