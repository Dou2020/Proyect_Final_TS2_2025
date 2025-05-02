<?php

namespace App\Http\Controllers;

use App\Models\Ocupante;
use App\Models\Nicho;
use App\Models\Usuario;
use Illuminate\Http\Request;

class OcupanteController extends Controller
{
    /**
     * Mostrar todos los ocupantes.
     */
    public function index()
    {
        $ocupantes = Ocupante::with(['nicho', 'usuario'])->get();
        return view('ocupantes.index', compact('ocupantes'));
    }

    /**
     * Mostrar formulario para crear un nuevo ocupante.
     */
    public function create()
    {
        $nichos = Nicho::all();
        $usuarios = Usuario::all();
        return view('ocupantes.create', compact('nichos', 'usuarios'));
    }

    /**
     * Guardar un nuevo ocupante.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_fallecimiento' => 'required|date',
            'causa_muerte' => 'required|string|max:255',
            'nicho_id' => 'required|exists:nichos,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        Ocupante::create($request->all());

        return redirect()->route('ocupantes.index')->with('success', 'Ocupante registrado correctamente.');
    }

    /**
     * Mostrar los datos de un ocupante.
     */
    public function show(Ocupante $ocupante)
    {
        return view('ocupantes.show', compact('ocupante'));
    }

    /**
     * Mostrar formulario para editar un ocupante.
     */
    public function edit(Ocupante $ocupante)
    {
        $nichos = Nicho::all();
        $usuarios = Usuario::all();
        return view('ocupantes.edit', compact('ocupante', 'nichos', 'usuarios'));
    }

    /**
     * Actualizar los datos del ocupante.
     */
    public function update(Request $request, Ocupante $ocupante)
    {
        $request->validate([
            'fecha_fallecimiento' => 'required|date',
            'causa_muerte' => 'required|string|max:255',
            'nicho_id' => 'required|exists:nichos,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $ocupante->update($request->all());

        return redirect()->route('ocupantes.index')->with('success', 'Ocupante actualizado correctamente.');
    }

    /**
     * Eliminar un ocupante.
     */
    public function destroy(Ocupante $ocupante)
    {
        $ocupante->delete();

        return redirect()->route('ocupantes.index')->with('success', 'Ocupante eliminado.');
    }
}
