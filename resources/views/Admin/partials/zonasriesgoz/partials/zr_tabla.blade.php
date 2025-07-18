<button
    hx-get="{{ url('/admin/zonas_riesgoz/nuevo') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    title="Editar riesgo"
    class="mb-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition"
>
    🏠 Nuevo
</button>

<div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-red-100">
      <tr>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Nombre</th>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Tipo</th>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Descripción</th>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Coordenadas</th>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Activa</th>
        <th class="px-4 py-2 text-left text-xs font-semibold text-red-700 uppercase">Acciones</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach($zonasR as $zona)
      <tr>
        <td class="px-4 py-2 whitespace-nowrap">{{ $zona->nombre }}</td>
        <td class="px-4 py-2 whitespace-nowrap">{{ $zona->tipo }}</td>
        <td class="px-4 py-2 whitespace-nowrap">{{ $zona->descripcion }}</td>
        <td class="px-4 py-2 whitespace-pre-wrap">
          @foreach(json_decode($zona->coordenadas, true) as $c)
            ({{ $c[0] }}, {{ $c[1] }})<br>
          @endforeach
        </td>
        <td class="px-4 py-2 whitespace-nowrap">{{ $zona->activa ? 'Sí' : 'No' }}</td>
        <td class="px-4 py-2 whitespace-nowrap space-x-2">
          <button
            hx-get="{{ url('/admin/zonas_riesgoz/'.$zona->id.'/editar') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
            class="px-3 py-1 bg-yellow-400 text-yellow-900 rounded hover:bg-yellow-500 transition"
          >Editar</button>

          <button
            onclick="return confirm('¿Eliminar zona de riesgo?')"
            hx-delete="{{ url('/admin/zonas_riesgoz/'.$zona->id.'/eliminar') }}"
            hx-headers='{"X-CSRF-TOKEN":"{{ csrf_token() }}"}'
            hx-target="#formulario"
            hx-swap="innerHTML"
            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition"
          >Eliminar</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
