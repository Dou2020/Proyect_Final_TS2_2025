<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

public function __construct()
{
    // Constructor should not return a value
}

public function showHome()
{
    
    // Si ya está autenticado, redirige al dashboard
    //if (Auth::check()) {
        return redirect()->route('home')->with('success', 'Ya estás autenticado.');
    //}

    //return view('login');
}
    // 
    public function index()
    {
        
        return view('home');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }

}
