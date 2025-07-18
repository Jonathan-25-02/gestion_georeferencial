<form
    hx-post="{{ url('/admin/zonas_seguras/nuevo/guardar') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    method="POST"
    class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-200"
>
    @csrf

    <h2 class="text-3xl font-extrabold text-gray-800">Nueva Zona Segura</h2>

    <div class="space-y-4">
        <div>
            <label for="nombre" class="block text-sm font-semibold text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre"
                   value="{{ old('nombre') }}" required
                   class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
        </div>

        <div>
            <label for="tipo" class="block text-sm font-semibold text-gray-700">Tipo</label>
            <input type="text" name="tipo" id="tipo"
                   value="{{ old('tipo') }}" required
                   class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-semibold text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4"
                      class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >{{ old('descripcion') }}</textarea>
        </div>

        <div>
            <label for="radio_metros" class="block text-sm font-semibold text-gray-700">Radio (metros)</label>
            <input type="number" name="radio_metros" id="radio_metros"
                   value="{{ old('radio_metros', 50) }}" min="1"
                   class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
        </div>
    </div>

    <input type="hidden" name="latitud" id="latitud" value="{{ old('latitud', -0.9374805) }}">
    <input type="hidden" name="longitud" id="longitud" value="{{ old('longitud', -78.6161327) }}">

    <div class="mt-6 rounded-xl overflow-hidden border border-gray-300 shadow-inner">
        <div id="seleccionar_punto_usuario" class="h-64 w-full"></div>
    </div>

    <div class="flex justify-end gap-4 pt-6">
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
            class="px-8 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
        >
            Guardar
        </button>
    </div>
</form>
