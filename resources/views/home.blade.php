<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-white shadow-md p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-700">Panel de Usuario</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center">
        <div class="text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">¡Bienvenido, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600 text-lg">Estás dentro del sistema. 🚀</p>
        </div>
    </main>

    <footer class="bg-white text-center p-4 text-gray-500 text-sm">
        © {{ date('Y') }} Mi Sistema Laravel · Todos los derechos reservados
    </footer>

</body>
</html>
