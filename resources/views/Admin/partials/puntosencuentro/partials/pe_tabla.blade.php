<div class="mb-6">
    <button
        hx-get="{{ url('/admin/puntos_encuentro/nuevo') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Editar punto"
        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition"
    >
        🏠 Nuevo
    </button>
</div>

<div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Latitud</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Longitud</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($Puntos as $punto)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $punto->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $punto->descripcion }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $punto->latitud }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $punto->longitud }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                    <button
                        hx-get="{{ url('/admin/puntos_encuentro/'.$punto->id.'/editar') }}"
                        hx-target="#formulario"
                        hx-swap="innerHTML"
                        class="px-3 py-1 bg-yellow-400 text-yellow-900 rounded hover:bg-yellow-500 transition"
                    >
                        Editar
                    </button>
                    <button
                        onclick="return confirm('¿Seguro que quieres eliminar este punto?')"
                        hx-delete="{{ url('/admin/puntos_encuentro/'.$punto->id.'/eliminar') }}"
                        hx-headers='{"X-CSRF-TOKEN":"{{ csrf_token() }}"}'
                        hx-target="#formulario"
                        hx-swap="innerHTML"
                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                    >
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
