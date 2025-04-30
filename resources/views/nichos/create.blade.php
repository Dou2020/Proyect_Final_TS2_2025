@extends('layouts.app') <!-- Asegúrate de tener un layout base -->

@section('title', 'Registrar Nicho')

@section('options')
    @include('admin.option')
@endsection

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Registrar Nicho</h2>

    <form method="POST" action="{{ route('nichos.store') }}">
        @csrf

        <!-- Código -->
        <div class="mb-4">
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('codigo')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tipo de nicho -->
        <div class="mb-4">
            <label for="tipo_nicho_id" class="block text-sm font-medium text-gray-700">Tipo de Nicho</label>
            <select name="tipo_nicho_id" id="tipo_nicho_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Seleccione un tipo</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ old('tipo_nicho_id') == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
            @error('tipo_nicho_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Calle -->
        <div class="mb-4">
            <label for="calle" class="block text-sm font-medium text-gray-700">Calle</label>
            <input type="text" name="calle" id="calle" value="{{ old('calle') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('calle')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Avenida -->
        <div class="mb-4">
            <label for="avenida" class="block text-sm font-medium text-gray-700">Avenida</label>
            <input type="text" name="avenida" id="avenida" value="{{ old('avenida') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('avenida')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Estado del nicho -->
        <div class="mb-4">
            <label for="estado_nicho_id" class="block text-sm font-medium text-gray-700">Estado del Nicho</label>
            <select name="estado_nicho_id" id="estado_nicho_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Seleccione un estado</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}" {{ old('estado_nicho_id') == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nombre }}
                    </option>
                @endforeach
            </select>
            @error('estado_nicho_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Personaje histórico -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="personaje_historico" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm" {{ old('personaje_historico') ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-700">¿Es personaje histórico?</span>
            </label>
            @error('personaje_historico')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
