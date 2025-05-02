@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
    <h1 class="text-xl font-semibold mb-4">
        {{ isset($ocupante) ? 'Editar Ocupante' : 'Nuevo Ocupante' }}
    </h1>

    <form action="{{ isset($ocupante) ? route('ocupantes.update', $ocupante) : route('ocupantes.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($ocupante))
            @method('PUT')
        @endif

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
                @foreach($nichos as $nicho)
                    <option value="{{ $nicho->id }}" {{ (old('nicho_id', $ocupante->nicho_id ?? '') == $nicho->id) ? 'selected' : '' }}>
                        {{ $nicho->codigo }}
                    </option>
                @endforeach
            </select>
        </div>

<!-- Assuming you have a list of users to select from -->
<div x-data="{ showNewUser: false }" class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Usuario </label>

    <select name="usuario_id" class="block w-full border-gray-300 rounded shadow-sm">
        <option value="">Seleccione un usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->nombre }}
            </option>
        @endforeach
    </select>

    <button type="button" @click="showNewUser = !showNewUser" class="text-sm text-blue-600 hover:underline">
        + Agregar nuevo usuario
    </button>

    <div x-show="showNewUser" class="p-4 bg-gray-50 border rounded space-y-2">
        <input type="text" name="nuevo_nombre" placeholder="Nombre"  class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200"/>
        <input type="text" name="nuevo_user" placeholder="Usuario" class="block w-full border-gray-300 rounded shadow-sm" />
        <input type="email" name="nuevo_email" placeholder="Correo electrónico" class="block w-full border-gray-300 rounded shadow-sm" />
        <input type="password" name="nuevo_password" placeholder="Contraseña" class="block w-full border-gray-300 rounded shadow-sm" />
    </div>
</div>


        <div class="pt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                {{ isset($ocupante) ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>
@endsection

