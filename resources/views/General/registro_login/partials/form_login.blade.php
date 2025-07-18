<h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Iniciar Sesión</h2>

<form id="formLogin" method="POST" action="{{ url('/iniciarSesion') }}" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
    @csrf

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
        <input type="password" name="password" id="password" required
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div class="pt-4">
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            Entrar
        </button>
    </div>
</form>
