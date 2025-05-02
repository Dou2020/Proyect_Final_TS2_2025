@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Listado de Contratos</h1>

    <a href="{{ route('contratos.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Nuevo Contrato
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Fecha Inicio</th>
                    <th class="px-4 py-2">Fecha Final</th>
                    <th class="px-4 py-2">Pago</th>
                    <th class="px-4 py-2">Costo</th>
                    <th class="px-4 py-2">Boleta</th>
                    <th class="px-4 py-2">Nicho</th>
                    <th class="px-4 py-2">Responsable</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contratos as $contrato)
                    <tr class="border-t text-sm text-gray-700">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contrato->fecha_inicio)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contrato->fecha_final)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded {{ $contrato->boleta?->estado_pago ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $contrato->boleta?->estado_pago ? 'Pagado' : 'Pendiente' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">Q {{ $contrato->boleta?->monto ?? 00.00 }}</td>
                        <td class="px-4 py-2">{{ $contrato->boleta?->numero_boleta ?? 'No generada' }}</td>
                        <td class="px-4 py-2">{{ $contrato->ocupante?->nicho->codigo ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $contrato->usuario->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 space-x-2">
                        <form action="{{ route('contratos.renovar', $contrato->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-green-600 hover:underline">
                                Renovar
                            </button>
                        </form>

                            <a href="{{ route('contratos.edit', $contrato) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('contratos.destroy', $contrato) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Eliminar este contrato?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center px-4 py-4 text-gray-500">No hay contratos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
