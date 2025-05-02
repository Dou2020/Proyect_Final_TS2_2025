<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Genero;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::with(['rol', 'genero'])->get();
        return view('usuario.index', compact('usuarios'));
    }

    // Mostrar un usuario por ID
    public function show($id)
    {
        $usuario = Usuario::with(['rol', 'genero'])->find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario, 200);
    }
    
    public function create(){
        $roles = Rol::all();
        $generos = Genero::all();
        return view('usuario.create',compact('roles','generos'));
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255|unique:usuarios,user',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dpi' => 'required|string|max:13|unique:usuarios,dpi',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:4',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:15',
            'rol_id' => 'required|exists:roles,id',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $usuario = Usuario::create([
            ...$request->except('password'),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success','Usuario creado correctamente.');
    }

    public function edit(Usuario $usuario){
        $roles = Rol::all();
        $generos = Genero::all();
        return view('usuario.edit', compact('roles','generos','usuario'));
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $validation = $request->validate([
            'user' => ['string', 'max:255', Rule::unique('usuarios')->ignore($usuario->id)],
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'fecha_nacimiento' => 'date',
            'dpi' => ['string', 'max:13', Rule::unique('usuarios')->ignore($usuario->id)],
            'email' => ['email', Rule::unique('usuarios')->ignore($usuario->id)],
            'password' => 'nullable|string|min:8',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:15',
            'rol_id' => 'exists:roles,id',
            'genero_id' => 'exists:generos,id',
        ]);

        $usuario->fill($request->except('password'));

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'usuario actualizado correctamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
