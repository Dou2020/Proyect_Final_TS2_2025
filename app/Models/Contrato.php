<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'estado_contrato_id',
        'comprobante_imagen',
        'ocupante_id', 
        'usuario_id',
    ];

    public function estadoContrato()
    {
        return $this->belongsTo(EstadoContrato::class);
    }

    // Relación con ocupante
    public function ocupante()
    {
        return $this->belongsTo(Ocupante::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

