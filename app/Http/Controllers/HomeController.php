<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function showHome()
    {
        $user = Auth::guard('usuarios')->user();
        if($user->rol_id == 1){
            return view('admin.user');
        }
        if($user->rol_id == 2){
            return view('ayudante.user');
        }
        if($user->rol_id == 3){
            return view('auditor.user');
        }
        if($user->rol_id == 4){
            return view('user.user');
        }
        return view('home');

    }

}
