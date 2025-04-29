<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    use HasFactory;

    protected $table = 'exhumaciones';

    protected $fillable = [
        'fecha',
        'motivo',
        'ocupante_anterior_id',
        'nuevo_ocupante_id',
        'usuario_id',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    // Relaciones
    public function ocupanteAnterior()
    {
        return $this->belongsTo(Ocupante::class, 'ocupante_anterior_id');
    }

    public function nuevoOcupante()
    {
        return $this->belongsTo(Ocupante::class, 'nuevo_ocupante_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

