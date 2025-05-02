@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detalles del Ocupante</h2>

    <p class="mt-2"><strong>Nicho:</strong> {{ $nicho->codigo }}</p>
    <p class="mt-2"><strong>Fecha de fallecimiento:</strong> {{ $ocupante->fecha_fallecimiento }}</p>
    <p class="mt-2"><strong>Causa de muerte:</strong> {{ $ocupante->causa_muerte }}</p>
    <h2 class="text-2xl font-semibold mt-4 text-gray-800">Difunto</h2>
    <p class="mt-2"><strong>Nombre:</strong> {{ $ocupante->usuario->nombre }} {{$ocupante->usuario->apellido}}</p>
    <p class="mt-2"><strong>DPI:</strong> {{ $ocupante->usuario->dpi }}</p>
    <p class="mt-2"><strong>Fecha de Nacimiento:</strong> {{ $ocupante->usuario->fecha_nacimiento }}</p>    
    <p class="mt-2"><strong>Direccion:</strong> {{ $ocupante->usuario->direccion }}</p>
    <div class="mt-6">
        <a href="{{ route('nichos.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>
</div>
@endsection
