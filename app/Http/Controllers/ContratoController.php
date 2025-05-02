<?php

// app/Http/Controllers/ContratoController.php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Usuario;
use App\Models\Genero;
use App\Models\Nicho;
use App\Models\Ocupante;
use App\Models\EstadoContrato;
use App\Models\TipoBoleta;
use App\Models\Boleta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::with(['usuario', 'ocupante', 'estadoContrato','boleta'])->get();
        return view('contratos.index', compact('contratos'));
    }
    public function create()
    {
        $generos = Genero::all();
        $nichos = Nicho::where('estado_nicho_id', 1)->get(); // Solo los nichos disponibles
        $estados = EstadoContrato::all();
        $tiposBoleta = TipoBoleta::all(); // Trae los tipos de boleta para mostrar en la vista
    
        return view('contratos.create', compact('generos', 'nichos', 'estados', 'tiposBoleta'));
    }
    

    // Registrar un nuevo contrato
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'fecha_fallecimiento' => 'required|date',
            'dpi' => 'required|string|max:20|unique:usuarios,dpi',
            'direccion' => 'required|string',
            'causa_muerte' => 'required|string',
            'genero_id' => 'required|exists:generos,id',
            'nicho_id' => 'required|exists:nichos,id',
            'fecha_inicio' => 'required|date',
            'comprobante_imagen' => 'nullable|image|max:2048',
        ]);
    
        // 1. Crear usuario (difunto)
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'dpi' => $request->dpi,
            'direccion' => $request->direccion,
            'genero_id' => $request->genero_id,
            'estado' => false,
            'rol_id' => 5, // Asignar null o el rol correspondiente
        ]);
    
        // 2. Crear ocupante
        $ocupante = Ocupante::create([
            'fecha_fallecimiento' => $request->fecha_nacimiento,
            'causa_muerte' => 'No especificada',
            'nicho_id' => $request->nicho_id,
            'usuario_id' => $usuario->id,
        ]);
    
        // 3. Subir comprobante si existe
        $imagenPath = null;
        if ($request->hasFile('comprobante_imagen')) {
            $imagenPath = $request->file('comprobante_imagen')->store('comprobantes', 'public');
        }

            // Sumar 6 años a la fecha de inicio
        $fecha_inicio = Carbon::parse($request->fecha_inicio);
        $fecha_final = $fecha_inicio->copy()->addYears(6);
    
        // 4. Crear contrato
        $contrato = Contrato::create([
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final,
            'estado_contrato_id' => 1,
            'comprobante_imagen' => $imagenPath,
            'ocupante_id' => $ocupante->id,
            'usuario_id' => auth()->id(),
        ]);

        // 4.1 Cambiar el estado del nicho a "ocupado" (asumimos que el ID 2 es 'ocupado')
        $nicho = Nicho::find($request->nicho_id);
        $nicho->estado_nicho_id = 2; // ID para estado "ocupado"
        $nicho->save();
    
        // 5. Crear boleta automáticamente
        $numeroBoleta = 'BOL-' . strtoupper(uniqid());
    
        Boleta::create([
            'numero_boleta' => $numeroBoleta,
            'contrato_id' => $contrato->id,
            'tipo_boleta_id' => 1, // Puedes cambiarlo si hay varios tipos
            'fecha_emision' => now(),
            'monto' => 600.00, // Aquí puedes calcular el monto real si aplica
            'estado_pago' => false,
        ]);
    
        return redirect()->route('contratos.index')->with('success', 'Contrato y boleta registrados correctamente.');
    }
    
    public function edit(Contrato $contrato)
    {
        $usuarios = Usuario::all();
        $nichos = Nicho::all();
        $estados = EstadoContrato::all();
        return view('contratos.edit', compact('contrato', 'usuarios', 'nichos', 'estados'));
    }

    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'estado_contrato_id' => 'required|exists:estado_contrato,id',
            'nicho_id' => 'required|exists:nichos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'comprobante_imagen' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('comprobante_imagen')) {
            $data['comprobante_imagen'] = $request->file('comprobante_imagen')->store('comprobantes', 'public');
        }

        $contrato->update($data);

        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado.');
    }

    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('contratos.index')->with('success', 'Contrato eliminado.');
    }

    public function renovarContrato(Contrato $contrato)
    {
        // Añadir 1 año a la fecha final
        $nuevaFechaFinal = Carbon::parse($contrato->fecha_final)->addYear();

        // Actualizar la fecha final del contrato
        $contrato->fecha_final = $nuevaFechaFinal;
        $contrato->save();

        // Generar una nueva boleta
        $numeroBoleta = 'BOL-' . strtoupper(uniqid());

        Boleta::create([
            'numero_boleta' => $numeroBoleta,
            'contrato_id' => $contrato->id,
            'tipo_boleta_id' => 2, // Suponiendo que el tipo de boleta 1 es el que corresponde
            'fecha_emision' => now(),
            'monto' => 600.00, // Aquí puedes ajustar el monto si es necesario
            'estado_pago' => false, // El estado de pago es inicialmente pendiente
        ]);

        return redirect()->route('contratos.index')->with('success', 'Contrato renovado y nueva boleta generada correctamente.');
    }

}


