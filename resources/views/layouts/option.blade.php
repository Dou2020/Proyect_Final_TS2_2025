<a href="{{ route('nichos.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    Nichos
</a>
<a href="{{ route('ocupantes.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    Ocupantes
</a>  
@if ( !Auth::guard('usuarios')->user()->isUsuario())
    <a href="{{ route('login') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
        Responsables
    </a>
@endif
<a href="{{ route('contratos.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    Contratos
</a>
<a href="{{ route('boletas.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    Boletas de Pago
</a>
<a href="{{ route('login') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    Exhumaciones
</a>

@if ( Auth::guard('usuarios')->user()->isAdmin() )
    <a href="{{ route('usuarios.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
        Usuarios
    </a>
@endif