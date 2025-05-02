@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Listado de Boletas</h1>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">Número de Boleta</th>
                    <th class="px-4 py-2 text-left">Contrato</th>
                    <th class="px-4 py-2 text-left">Tipo</th>
                    <th class="px-4 py-2 text-left">Fecha de Emisión</th>
                    <th class="px-4 py-2 text-left">Monto</th>
                    <th class="px-4 py-2 text-left">Estado de Pago</th>
                    <th class="px-4 py-2 text-left font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boletas as $boleta)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $boleta->numero_boleta }}</td>
                        <td class="px-4 py-2">#{{ $boleta->contrato->id }}</td>
                        <td class="px-4 py-2">{{ $boleta->tipoBoleta->nombre }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($boleta->fecha_emision)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">Q{{ number_format($boleta->monto, 2) }}</td>
                        <td class="px-4 py-2">
                            @if($boleta->estado_pago)
                                <span class="text-green-600 font-semibold">Pagado</span>
                            @else
                                <span class="text-red-600 font-semibold">Pendiente</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                        <form action="{{ route('boletas.cambiarEstado', $boleta->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-indigo-600 hover:underline">
                                {{ $boleta->estado_pago ? 'Realizado' : 'Confirmar' }}
                            </button>
                        </form>
                            <form action="{{ route('boletas.destroy', $boleta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar esta boleta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
