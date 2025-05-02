@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Registrar Nuevo Contrato</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contratos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-6">
        @csrf


        <h2 class="text-xl font-semibold mb-4 border-b pb-2">Datos del Difunto</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Nombre</label>
                <input type="text" name="nombre" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">Apellido</label>
                <input type="text" name="apellido" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-semibold">Fecha de Fallecimiento</label>
                <input type="date" name="fecha_fallecimiento" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">DPI</label>
                <input type="text" name="dpi" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold">Género</label>
                <select name="genero_id" class="w-full border rounded p-2" required>
                    @foreach($generos as $genero)
                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label class="block font-semibold">Dirección</label>
                <textarea name="direccion" rows="2" class="w-full border rounded p-2" required></textarea>
            </div>
            <div class="col-span-2">
                <label class="block font-semibold">Causa de Muerte</label>
                <textarea name="causa_muerte" rows="2" class="w-full border rounded p-2" required></textarea>
            </div>

            <div class="col-span-2">
                <label class="block font-semibold">Nicho Disponible</label>
                <select name="nicho_id" ows="2"class="w-full border rounded p-2" required>
                    @foreach($nichos as $nicho)
                        <option value="{{ $nicho->id }}">{{ $nicho->codigo }} - {{ $nicho->calle }} {{ $nicho->avenida }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4 border-b pb-2">Datos del Contrato</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="w-full border rounded p-2" required>
            </div>

            <div class="col-span-2">
                <label class="block font-semibold">Comprobante (opcional)</label>
                <input type="file" name="comprobante_imagen" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="pt-4">
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Guardar Contrato</button>
            <a href="{{ route('contratos.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection


