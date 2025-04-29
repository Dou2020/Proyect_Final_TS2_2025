@extends('layouts.app')

@section('title', 'Menu Principal')

@section('options')
    @include('ayudante.option')
@endsection

@section('content')
    <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">
            ¡Bienvenido, {{ Auth::guard('usuarios')->user()->nombre }}!
        </h2>
        <p class="text-gray-600 text-lg">Estás dentro del sistema. 🚀</p>
    </div>
@endsection
