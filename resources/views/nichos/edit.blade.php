@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Nicho</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nichos.update', $nicho->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $nicho->codigo) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly required>
        </div>


        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="tipo_nicho_id" id="tipo_nicho_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">-- Selecciona un Tipo --</option>
                <option value="1" {{ old('tipo', $nicho->tipoNicho->nombre) == 'Niño' ? 'selected' : '' }}>Niño</option>
                <option value="2" {{ old('tipo', $nicho->tipoNicho->nombre) == 'Adulto' ? 'selected' : '' }}>Adulto</option>
            </select>
        </div>

        <div>
            <label for="calle" class="block text-sm font-medium text-gray-700">Calle</label>
            <input type="text" name="calle" id="calle" value="{{ old('calle', $nicho->calle) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="avenida" class="block text-sm font-medium text-gray-700">Avenida</label>
            <input type="text" name="avenida" id="avenida" value="{{ old('avenida', $nicho->avenida) }}" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="estado_nicho_id" id="estado_nicho_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">-- Selecciona un estado --</option>
                <option value="1" {{ old('estado', $nicho->estadoNicho->nombre) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ old('estado', $nicho->estadoNicho->nombre) == 'Ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="3" {{ old('estado', $nicho->estadoNicho->nombre) == 'Proceso Exhumación' ? 'selected' : '' }}>Proceso Exhumación</option>
            </select>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="personaje_historico" id="personaje_historico" class="mr-2"
                {{ old('personaje_historico', $nicho->personaje_historico) ? 'checked' : '' }}>
            <label for="personaje_historico" class="text-sm text-gray-700">¿Personaje histórico?</label>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('nichos.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Actualizar</button>
        </div>
    </form>
</div>
@endsection


