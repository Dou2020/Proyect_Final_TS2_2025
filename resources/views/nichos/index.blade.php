@php
    $usuario = Auth::guard('usuarios')->user();
@endphp

@extends('layouts.app')

@section('title', 'Lista de Nichos')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

@if ($usuario && !in_array($usuario->rol_id, [4, 5]))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <h2 class="text-lg font-semibold text-gray-700">Nichos Disponibles</h2>
            <p class="text-2xl text-green-600 font-bold">{{ $totalDisponibles }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <h2 class="text-lg font-semibold text-gray-700">Nichos Ocupados</h2>
            <p class="text-2xl text-red-600 font-bold">{{ $totalOcupados }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <h2 class="text-lg font-semibold text-gray-700">Ocupantes por Género</h2>
            @foreach($ocupantesPorGenero as $genero)
                <p class="text-md text-gray-800">{{ ucfirst($genero->genero) }}: <span class="font-bold">{{ $genero->total }}</span></p>
            @endforeach
        </div>
    </div>
@endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Nichos</h1>
        @if ($usuario && !in_array($usuario->rol_id, [4, 5]))
            <a href="{{ route('nichos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">+ Nuevo Nicho</a>
        @endif
    </div>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-3">Código</th>
                    <th class="px-6 py-3">Tipo</th>
                    <th class="px-6 py-3">Calle</th>
                    <th class="px-6 py-3">Avenida</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Histórico</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nichos as $nicho)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $nicho->codigo }}</td>
                    <td class="px-6 py-4">{{ $nicho->tipoNicho->nombre }}</td>
                    <td class="px-6 py-4">{{ $nicho->calle }}</td>
                    <td class="px-6 py-4">{{ $nicho->avenida }}</td>
                    <td class="px-6 py-4">{{ $nicho->estadoNicho->nombre }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold 
                            {{ $nicho->personaje_historico ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                            {{ $nicho->personaje_historico ? 'Sí' : 'No' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                    @if($nicho->estadoNicho->nombre == 'Ocupado')
                        <a href="{{ route('nichos.ocupante', $nicho->id) }}"
                            class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition text-xs">
                            Ocupante
                        </a>
                    @endif
                    @if ($usuario && !in_array($usuario->rol_id, [4, 5]))
                        <a href="{{ route('nichos.edit', $nicho->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition text-xs">
                            Editar
                        </a>
                        
                        <form action="{{ route('nichos.destroy', $nicho->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este nicho?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition text-xs">
                                Eliminar
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

