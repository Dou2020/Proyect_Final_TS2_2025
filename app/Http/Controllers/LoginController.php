<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        // Si ya está autenticado, redirige al dashboard
        if (Auth::check()) {
            
            return redirect()->route('home')->with('success', 'Ya estás autenticado.');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('user', 'password');
        //logger($credentials);
        
        // Intentar iniciar sesión
        if (Auth::guard('usuarios')->attempt($credentials)) {
            $request->session()->regenerate();

            // Aquí podés usar Auth::user() para acceder al usuario
            $user = Auth::user();
            logger($user);
            // Redirigimos según el rol o simplemente al dashboard
            return redirect()->route('home')->with('success', 'Bienvenido ' );
        }

        // Si falla el login
        return back()->withErrors([
            'user' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
