<div class="flex justify-center px-4">
  <div class="w-full max-w-4xl">
    <form 
      hx-post="{{ url('/admin/zonas_riesgoz/' . $zona->id . '/editar/guardar') }}"
      hx-target="#formulario"
      hx-swap="innerHTML"
      method="POST"
      onsubmit="return validarZonaRiesgo();"
      class="bg-white p-6 rounded-lg shadow-md space-y-6"
    >
      @csrf
      <h3 class="text-2xl font-bold mb-4">Editar Zona de Riesgo</h3>
      <hr class="mb-6 border-gray-300" />

      <div>
        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-1">Nombre:</label>
        <input
          type="text"
          name="nombre"
          id="nombre"
          value="{{ $zona->nombre }}"
          required
          class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
        />
      </div>

      <div>
        <label for="tipo" class="block text-sm font-semibold text-gray-700 mb-1">Tipo:</label>
        <input
          type="text"
          name="tipo"
          id="tipo"
          value="{{ $zona->tipo }}"
          required
          class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
        />
      </div>

      <div>
        <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-1">Descripción:</label>
        <textarea
          name="descripcion"
          id="descripcion"
          rows="4"
          class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
        >{{ $zona->descripcion }}</textarea>
      </div>

      <div class="flex items-center space-x-2">
        <input
          type="checkbox"
          name="activa"
          id="activa"
          {{ $zona->activa ? 'checked' : '' }}
          class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
        />
        <label for="activa" class="text-gray-700 font-medium select-none">Activa</label>
      </div>

      @php $coordenadas = json_decode($zona->coordenadas, true); @endphp

      @for($i=1; $i<=4; $i++)
        <div class="flex flex-col md:flex-row md:space-x-6 mb-8">
          <div class="md:w-1/3 space-y-1">
            <p class="font-semibold text-gray-700 mb-1">COORDENADA N° {{ $i }}</p>
            <label for="latitud{{ $i }}" class="block text-sm text-gray-600">Latitud:</label>
            <input
              type="number"
              step="any"
              name="latitud{{ $i }}"
              id="latitud{{ $i }}"
              value="{{ $coordenadas[$i-1][0] ?? '' }}"
              readonly
              class="w-full rounded-md border border-gray-300 px-3 py-2 bg-gray-100 cursor-not-allowed"
            />
            <label for="longitud{{ $i }}" class="block text-sm text-gray-600 mt-3">Longitud:</label>
            <input
              type="number"
              step="any"
              name="longitud{{ $i }}"
              id="longitud{{ $i }}"
              value="{{ $coordenadas[$i-1][1] ?? '' }}"
              readonly
              class="w-full rounded-md border border-gray-300 px-3 py-2 bg-gray-100 cursor-not-allowed"
            />
          </div>
          <div class="md:w-2/3 mt-4 md:mt-0">
            <div id="mapa{{ $i }}" class="w-full h-44 rounded border-2 border-gray-800"></div>
          </div>
        </div>
      @endfor

      <div class="flex justify-center space-x-4">
        <button
          type="submit"
          class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition"
        >Actualizar</button>

        <button
          type="reset"
          class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
        >Restablecer</button>

        <button
          type="button"
          onclick="graficarZonaRiesgo();"
          class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
        >Graficar Zona</button>
      </div>
    </form>
  </div>
</div>

<div class="mt-8">
  <div id="mapa-poligono" class="w-full h-[500px] border-4 border-blue-600 rounded-lg shadow-lg"></div>
</div>
