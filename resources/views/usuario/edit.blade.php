@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Editar Usuario</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-4 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Usuario</label>
            <input type="text" name="user" value="{{ old('user', $usuario->user) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Apellido</label>
            <input type="text" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">DPI</label>
            <input type="text" name="dpi" value="{{ old('dpi', $usuario->dpi) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block font-semibold">Dirección</label>
            <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}" class="w-full border rounded px-3 py-2 mt-1">
        </div>

        <div>
            <label class="block font-semibold">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" class="w-full border rounded px-3 py-2 mt-1">
        </div>

        <div>
            <label class="block font-semibold">Rol</label>
            <select name="rol_id" class="w-full border rounded px-3 py-2 mt-1" required>
                <option value="">Seleccionar rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Género</label>
            <select name="genero_id" class="w-full border rounded px-3 py-2 mt-1" required>
                <option value="">Seleccionar género</option>
                @foreach($generos as $genero)
                    <option value="{{ $genero->id }}" {{ $usuario->genero_id == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Contraseña (opcional)</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2 mt-1">
            <small class="text-gray-500">Déjalo en blanco si no deseas cambiarla.</small>
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('usuarios.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">Actualizar</button>
        </div>
    </form>
</div>
@endsection
