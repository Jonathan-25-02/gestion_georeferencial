<div class="max-w-4xl mx-auto px-4">
  <form 
    hx-post="{{ url('/admin/zonas_riesgoz/nuevo/guardar') }}"
    hx-target="#formulario"
    hx-swap="innerHTML"
    method="POST"
    onsubmit="return validarZonaRiesgo();"
    class="bg-white p-6 rounded-lg shadow-md space-y-6"
  >
    @csrf

    <h3 class="text-xl font-bold mb-4">Registrar Nueva Zona de Riesgo</h3>
    <hr class="mb-6 border-gray-300">

    <div class="space-y-4">
      <div>
        <label for="nombre" class="block font-semibold mb-1">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
      </div>

      <div>
        <label for="tipo" class="block font-semibold mb-1">Tipo:</label>
        <input type="text" name="tipo" id="tipo" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
      </div>

      <div>
        <label for="descripcion" class="block font-semibold mb-1">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="3"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
      </div>

      <div class="flex items-center space-x-2">
        <input type="checkbox" name="activa" id="activa" class="form-checkbox h-5 w-5 text-blue-600">
        <label for="activa" class="font-semibold">Activa</label>
      </div>

      @for($i=1; $i<=4; $i++)
        <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6 border border-gray-300 rounded p-4">
          <div class="w-full md:w-1/2 space-y-2">
            <h4 class="font-semibold">COORDENADA N° {{ $i }}</h4>
            <div>
              <label class="block text-sm">Latitud:</label>
              <input type="hidden" step="any" name="latitud{{ $i }}" id="latitud{{ $i }}" readonly
                class="w-full border border-gray-300 rounded px-2 py-1 bg-gray-100"
              >
            </div>
            <div>
              <label class="block text-sm">Longitud:</label>
              <input type="hidden" step="any" name="longitud{{ $i }}" id="longitud{{ $i }}" readonly
                class="w-full border border-gray-300 rounded px-2 py-1 bg-gray-100"
              >
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div id="mapa{{ $i }}" class="h-44 w-full border-2 border-black rounded"></div>
          </div>
        </div>
      @endfor
    </div>

    <div class="flex justify-center space-x-4 mt-6">
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded transition">Guardar</button>
      <button type="reset" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded transition">Limpiar</button>
      <button type="button" onclick="graficarZonaRiesgo();" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">Graficar Zona</button>
    </div>
  </form>

  <div class="mt-10 border-2 border-blue-600 rounded shadow-lg">
    <div id="mapa-poligono" class="w-full h-[500px]"></div>
  </div>
</div>
