<h3 class="text-lg font-semibold mb-4 text-gray-700">Verificar cuenta</h3>

<form method="POST" action="{{ url('/verificarCodigo') }}" id="formVerificar" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
    @csrf

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <div>
        <label for="codigo" class="block text-sm font-medium text-gray-700">Código de verificación:</label>
        <input type="text" name="codigo" id="codigo" maxlength="6" required
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
    </div>

    <button type="submit" 
        class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-md hover:bg-indigo-700 transition-colors">
        Verificar
    </button>
</form>
