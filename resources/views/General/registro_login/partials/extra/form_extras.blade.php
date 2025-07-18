<h3 class="text-lg font-semibold mb-2 text-gray-700">Opciones extra</h3>

<ul class="space-y-2">
    <li>
        <button
            class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200"
            hx-get="{{ url('/formRecuperar') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
        >
            Recuperar contraseña
        </button>
    </li>
    <li>
        <button
            class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200"
            hx-get="{{ url('/formVerificar') }}"
            hx-target="#formulario"
            hx-swap="innerHTML"
        >
            Verificar cuenta
        </button>
    </li>
</ul>
