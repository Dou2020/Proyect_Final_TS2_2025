@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Editar Nicho</h2>

    <form action="{{ route('nicho.update', $nicho->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Código</label>
            <input type="text" name="codigo" value="{{ old('codigo', $nicho->codigo) }}" class="mt-1 w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Tipo de Nicho</label>
            <select name="tipo_nicho_id" class="mt-1 w-full border rounded p-2" required>
                @foreach($tiposNicho as $tipo)
                    <option value="{{ $tipo->id }}" {{ $nicho->tipo_nicho_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Calle</label>
            <input type="text" name="calle" value="{{ old('calle', $nicho->calle) }}" class="mt-1 w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Avenida</label>
            <input type="text" name="avenida" value="{{ old('avenida', $nicho->avenida) }}" class="mt-1 w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Estado del Nicho</label>
            <select name="estado_nicho_id" class="mt-1 w-full border rounded p-2">
                @foreach($estadosNicho as $estado)
                    <option value="{{ $estado->id }}" {{ $nicho->estado_nicho_id == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="personaje_historico" value="1" class="mr-2"
                {{ $nicho->personaje_historico ? 'checked' : '' }}>
            <label>Personaje Histórico</label>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('nicho.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
        </div>
    </form>
</div>
@endsection

