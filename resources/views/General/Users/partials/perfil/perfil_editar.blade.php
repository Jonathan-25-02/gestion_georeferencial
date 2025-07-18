<form
    hx-post="{{ url('/perfil/editar/guardar') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    method="POST"
    class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl space-y-6 border border-gray-200">
    @csrf

    <h2 class="text-3xl font-extrabold text-gray-800">Editar Perfil</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Username</label>
            <input type="text" name="name" id="name"
                value="{{ old('name', $usuario->name) }}" required
                class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div>
            <label for="first_name" class="block text-sm font-semibold text-gray-700">Nombre</label>
            <input type="text" name="first_name" id="first_name"
                value="{{ old('first_name', $usuario->first_name) }}" required
                class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div>
            <label for="last_name" class="block text-sm font-semibold text-gray-700">Apellido</label>
            <input type="text" name="last_name" id="last_name"
                value="{{ old('last_name', $usuario->last_name) }}" required
                class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div>
            <label for="instagram" class="block text-sm font-semibold text-gray-700">Instagram</label>
            <input type="text" name="instagram" id="instagram"
                value="{{ old('instagram', optional($usuario->perfil)->instagram) }}"
                class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div>
            <label for="facebook" class="block text-sm font-semibold text-gray-700">Facebook</label>
            <input type="text" name="facebook" id="facebook"
                value="{{ old('facebook', optional($usuario->perfil)->facebook) }}"
                class="mt-1 w-full rounded-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
    </div>

    <!-- Coordenadas -->
    <input type="hidden" name="latitud" id="latitud"
        value="{{ old('latitud', optional($usuario->perfil)->latitud ?? -0.9374805) }}" />
    <input type="hidden" name="longitud" id="longitud"
        value="{{ old('longitud', optional($usuario->perfil)->longitud ?? -78.6161327) }}" />

    <!-- Mapa -->
    <div class="mt-4 rounded-xl overflow-hidden border border-gray-300">
        <div id="seleccionar_punto_usuario" class="h-64 w-full"></div>
    </div>

    <!-- Acciones -->
    <div class="flex justify-end gap-4 pt-4">
        <button
            type="button"
            hx-get="{{ url('/perfil') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            Cancelar
        </button>

        <button
            type="submit"
            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Guardar
        </button>
    </div>
</form>
