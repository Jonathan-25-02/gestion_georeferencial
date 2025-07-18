<h1 class="text-2xl font-bold mb-4 text-blue-700">👤 Perfil de Usuario</h1>

<div class="space-y-2 mb-4">
    <div><strong>ID:</strong> {{ $usuario->id }}</div>
    <div><strong>Nombre de usuario:</strong> {{ $usuario->name }}</div>
    <div><strong>Nombre completo:</strong> {{ $usuario->first_name }} {{ $usuario->last_name }}</div>
    <div><strong>Instagram:</strong> {{ $usuario->perfil->instagram ?? 'No disponible' }}</div>
    <div><strong>Facebook:</strong> {{ $usuario->perfil->facebook ?? 'No disponible' }}</div>
</div>

<div class="relative w-full h-[250px] border border-blue-300 rounded-md shadow-md overflow-hidden mb-4">
    <div id="mostrar_posicion_solo" class="w-full h-full"></div>
</div>

<div class="flex items-center space-x-4">
    <button 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        hx-get="{{ url('/perfil/editar') }}"
        hx-target="#formulario"
        hx-swap="innerHTML"
        title="Editar"
    >
        ✏️ Editar Perfil
    </button>

    <a href="/" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Salir</a>
</div>

<!-- Inputs ocultos -->
<input type="hidden" name="latitud" id="latitud" value="{{ old('latitud', optional($usuario->perfil)->latitud ?? -0.9374805) }}">
<input type="hidden" name="longitud" id="longitud" value="{{ old('longitud', optional($usuario->perfil)->longitud ?? -78.6161327) }}">


