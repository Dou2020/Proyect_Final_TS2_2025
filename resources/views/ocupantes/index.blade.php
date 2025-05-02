@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Listado de Ocupantes</h1>

    <a href="{{ route('ocupantes.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
        Nuevo Ocupante
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                <th class="px-4 py-2">Usuario</th>
                    <th class="px-4 py-2">Fallecimiento</th>
                    <th class="px-4 py-2">Causa</th>
                    <th class="px-4 py-2">Nicho</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($ocupantes as $ocupante)
                <tr>
                <td class="px-4 py-2">{{ $ocupante->usuario->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $ocupante->fecha_fallecimiento }}</td>
                    <td class="px-4 py-2">{{ $ocupante->causa_muerte }}</td>
                    <td class="px-4 py-2">{{ $ocupante->nicho->codigo ?? 'N/A' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('ocupantes.show', $ocupante) }}" class="text-blue-500 hover:underline">Ver</a>
                        <a href="{{ route('ocupantes.edit', $ocupante) }}" class="text-yellow-500 hover:underline">Editar</a>
                        <form action="{{ route('ocupantes.destroy', $ocupante) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este ocupante?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
