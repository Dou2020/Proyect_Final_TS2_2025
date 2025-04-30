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
        'tipo_nicho_id',
        'calle',
        'avenida',
        'estado_nicho_id',
        'personaje_historico',
    ];

    protected $casts = [
        'personaje_historico' => 'boolean',
    ];

    public function tipoNicho()
    {
        return $this->belongsTo(TipoNicho::class, 'tipo_nicho_id');
    }
    public function estadoNicho()
    {
        return $this->belongsTo(EstadoNicho::class, 'estado_nicho_id');
    }

}

