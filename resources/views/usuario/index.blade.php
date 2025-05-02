@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold mb-6">Lista de Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
            + Crear Usuario
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                <tr>
                    <th class="px-4 py-2 border-b">Usuario</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Apellido</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Rol</th>
                    <th class="px-4 py-2 border-b">Género</th>
                    <th class="px-4 py-2 border-b text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @forelse($usuarios as $usuario)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $usuario->user }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->nombre }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->apellido }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->rol->nombre ?? 'Sin rol' }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->genero->nombre ?? 'Sin género' }}</td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Ver</a>
                            @auth
                                @if(Auth::guard('usuarios')->user()->rol->nombre === 'Administrador')
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">Editar</a>
                            
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Eliminar</button>
                                    </form>
                                @endif
                            @endAuth
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-gray-500">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
