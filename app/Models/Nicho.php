<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nicho extends Model
{
    use HasFactory;

    protected $table = 'nichos';

    protected $fillable = [
        'codigo',
        'tipo',
        'calle',
        'avenida',
        'estado',
        'personaje_historico',
    ];

    protected $casts = [
        'personaje_historico' => 'boolean',
    ];
}

