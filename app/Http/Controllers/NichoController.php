<?php

namespace App\Http\Controllers;

use App\Models\Ocupante;
use App\Models\Nicho;
use App\Models\TipoNicho;
use App\Models\EstadoNicho;
use Illuminate\Http\Request;

class NichoController extends Controller
{
    /**
     * Mostrar todos los nichos.
     */
    public function index()
    {
        $nichos = Nicho::all();
        return view('nichos.index', compact('nichos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo nicho.
     */
    public function create()
    {
        $tipos = TipoNicho::all();
        $estados = EstadoNicho::all();
    
        return view('nichos.create', compact('tipos', 'estados'));
    }

    /**
     * Almacenar un nuevo nicho.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20|unique:nichos,codigo',
            'tipo_nicho_id' => 'required|exists:tipo_nicho,id',
            'calle' => 'required|string|max:50',
            'avenida' => 'required|string|max:50',
            'estado_nicho_id' => 'required|exists:estado_nicho,id',
            'personaje_historico' => 'nulleable|boolean',
        ]);

        $nicho = Nicho::create($validated);

        return redirect()->route('nichos.index')->with('success', 'Nicho creado exitosamente.');

    }

    /**
     * Mostrar un nicho específico.
     */
    public function show(Nicho $nicho)
    {
        return view('nichos.show', compact('nicho'));
    }

    /**
     * Mostrar el formulario para editar un nicho.
     */
    public function edit(Nicho $nicho)
    {
        return view('nichos.edit', compact('nicho'));
    }
    

    /**
     * Actualizar un nicho existente.
     */
    public function update(Request $request, Nicho $nicho)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20|exists:nichos,codigo',
            'tipo_nicho_id' => 'required|exists:tipo_nicho,id',
            'calle' => 'required|string|max:50',
            'avenida' => 'required|string|max:50',
            'estado_nicho_id' => 'required|exists:estado_nicho,id',
            'personaje_historico' => 'nulleable|boolean',
        ]);

        $nicho->update($validated);

        return redirect()->route('nichos.index')->with('success', 'Nicho actualizado correctamente.');
    }

    /**
     * Eliminar un nicho.
     */
    public function destroy(Nicho $nicho)
    {
        $nicho->delete();

        return redirect()->route('nichos.index')->with('success', 'Nicho eliminado correctamente.');
    }

    public function verOcupante(Nicho $nicho)
    {
        $ocupante = Ocupante::where('nicho_id', $nicho->id)->first();

        if (!$ocupante) {
            return redirect()->route('nichos.index')->with('error', 'Este nicho no tiene ocupante.');
        }

        return view('nichos.ocupante', compact('ocupante', 'nicho'));
    }


}

