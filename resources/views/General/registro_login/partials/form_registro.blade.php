<h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Registro</h2>

<form id="formRegistro" method="POST" action="{{ url('/guardarUsuario') }}" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
    @csrf

    <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Usuario:</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
        <input type="password" name="password" id="password" required minlength="6"
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div class="pt-4">
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            Registrar
        </button>
    </div>
</form>
