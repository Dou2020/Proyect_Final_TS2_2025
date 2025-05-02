@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
    <h1 class="text-xl font-semibold mb-4">
        Editar Ocupante
    </h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ocupantes.update', $ocupante) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de fallecimiento</label>
            <input type="date" name="fecha_fallecimiento" value="{{ old('fecha_fallecimiento', $ocupante->fecha_fallecimiento ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Causa de muerte</label>
            <input type="text" name="causa_muerte" value="{{ old('causa_muerte', $ocupante->causa_muerte ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nicho</label>
            <select name="nicho_id" class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                <option value="">Seleccione un nicho</option>
                <option value="{{ $ocupante->nicho->id }}" selected>
                        {{ $ocupante->nicho->codigo }}
                </option>
                @foreach($nichos as $nicho)
                    <option value="{{ $nicho->id }}">
                        {{ $nicho->codigo }}
                    </option>
                @endforeach
            </select>
        </div>

<!-- Assuming you have a list of users to select from -->
<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Difunto</label>

    <div class="p-4 bg-gray-50 border rounded space-y-2">
        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $ocupante->usuario->nombre ?? '') }}" placeholder="Nombre del Difunto" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Apellido</label>
            <input type="text" name="apellido" value="{{ old('apellido', $ocupante->usuario->apellido ?? '') }}" placeholder="Apellido del Difunto" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>
        <div>
            <label class="block font-semibold">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $ocupante->usuario->fecha_nacimiento ?? '') }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>
        <div>
            <label class="block font-semibold">DPI</label>
            <input type="text" name="dpi" value="{{ old('dpi', $ocupante->usuario->dpi ?? '') }}" placeholder="DPI del Difunto" class="w-full border rounded px-3 py-2 mt-1" required readonly>
        </div>
        <div>
            <label class="block font-semibold">Dirección</label>
            <input type="text" name="direccion" value="{{ old('direccion', $ocupante->usuario->direccion ?? '') }}" placeholder="Direccion del difunto" class="w-full border rounded px-3 py-2 mt-1">
        </div>
        <div>
            <label class="block font-semibold">Género</label>
            <select name="genero_id" class="w-full border rounded px-3 py-2 mt-1" required>
                <option value="">Seleccionar género</option>
                @foreach($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('genero_id',$ocupante->usuario->genero->id) == $genero->id ? 'selected' : '' }}>{{ $genero->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('ocupantes.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">Cancelar</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                {{ isset($ocupante) ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>
@endsection

