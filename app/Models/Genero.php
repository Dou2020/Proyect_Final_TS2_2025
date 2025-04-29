<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención Laravel)
    protected $table = 'generos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
    ];
}
