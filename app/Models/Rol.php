<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Tabla asociada (opcional si sigue la convención Laravel)
    protected $table = 'roles';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
    ];
}

