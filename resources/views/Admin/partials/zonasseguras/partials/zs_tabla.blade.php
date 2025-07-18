<table class="min-w-full table-auto border-collapse border border-gray-300 shadow-sm rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Tipo</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Descripción</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Latitud</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Longitud</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Radio</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-sm font-semibold text-gray-700">Activa</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-sm font-semibold text-gray-700">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($zonasS as $zona)
        <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->nombre }}</td>
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->tipo }}</td>
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->descripcion }}</td>
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->latitud }}</td>
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->longitud }}</td>
            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $zona->radio_metros }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center text-gray-800">
                {{ $zona->activa ? 'Sí' : 'No' }}
            </td>
            <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                <button
                    hx-get="{{ url('/admin/zonas_seguras/'.$zona->id.'/editar') }}"
                    hx-target="#formulario"
                    hx-swap="innerHTML"
                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                >
                    Editar
                </button>

                <button 
                    onclick="return confirm('¿Seguro que quieres eliminar este punto?')"
                    hx-delete="/admin/zonas_seguras/{{ $zona->id }}/eliminar"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-target="#tabla-zonas"
                    hx-swap="outerHTML"
                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition"
                >
                    Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
