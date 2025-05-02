<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    public function index()
    {
        $boletas = Boleta::with(['contrato', 'tipoBoleta'])->get();
        return view('boletas.index', compact('boletas'));
    }

    public function cambiarEstado(Boleta $boleta)
    {
        $boleta->estado_pago = !$boleta->estado_pago; // Cambia de true a false y viceversa
        $boleta->save();

        return redirect()->route('boletas.index')->with('success', 'Estado de pago actualizado correctamente.');
    }

}
