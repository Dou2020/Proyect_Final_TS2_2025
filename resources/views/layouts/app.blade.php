<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md h-screen fixed">
        <div class="p-4">
            <h2 class="text-xl font-bold text-gray-700 mb-4">Menú</h2>
            <nav class="space-y-2">
                @include('layouts.option')
            </nav>
        </div>
    </aside>

    <!-- Main content -->
    <div class="ml-64 flex flex-col flex-grow min-h-screen">

        <!-- Header -->
        <header class="bg-white shadow-md p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-700">{{ Auth::guard('usuarios')->user()->rol->nombre }}: {{ Auth::guard('usuarios')->user()->nombre }}</h1>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </header>

        <!-- Main content section -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white text-center p-4 text-gray-500 text-sm">
            © {{ date('Y') }} Cementerio General de Quetzaltenango · Todos los derechos reservados
        </footer>

    </div>
</body>
</html>
