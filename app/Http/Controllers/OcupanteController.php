<?php

namespace App\Http\Controllers;

use App\Models\Ocupante;
use App\Models\Nicho;
use App\Models\Usuario;
use App\Models\Genero;
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
        $nichos = Nicho::where('estado_nicho_id',1)->get();
        $usuarios = Usuario::all();
        $generos = Genero::all();
        return view('ocupantes.create', compact('generos','nichos', 'usuarios'));
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
            // Datos del difunto (usuario)
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dpi' => 'required|string|max:25|unique:usuarios,dpi',
            'direccion' => 'nullable|string|max:255',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $nicho = Nicho::find($request->nicho_id);

        $nicho->update([
            'estado_nicho_id' => 2, // Cambiar el estado del nicho a ocupado
        ]);

        // Crear el usuario (difunto)
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'dpi' => $request->dpi,
            'direccion' => $request->direccion,
            'genero_id' => $request->genero_id,
            'estado' => false, // Estado por defecto
        ]);

        // Crear el ocupante
        Ocupante::create([
            'fecha_fallecimiento' => $request->fecha_fallecimiento,
            'causa_muerte' => $request->causa_muerte,
            'nicho_id' => $request->nicho_id,
            'usuario_id' => $usuario->id,
        ]);


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
        $nichos = Nicho::where('estado_nicho_id',1)->get();
        $usuario = Usuario::all();
        $generos = Genero::all();
        return view('ocupantes.edit', compact('ocupante', 'nichos', 'usuario','generos'));
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
            // Datos del difunto (usuario)
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dpi' => 'required|string|max:25|exists:usuarios,dpi',
            'direccion' => 'nullable|string|max:255',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $ocupante->update([
            'fecha_fallecimiento' => $request->fecha_fallecimiento,
            'causa_muerte' => $request->causa_muerte,
            'nicho_id' => $request->nicho_id,
        ]);

        $ocupante->usuario->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'dpi' => $request->dpi,
            'direccion' => $request->direccion,
            'genero_id' => $request->genero_id,
        ]);

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
