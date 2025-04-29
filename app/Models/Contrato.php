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
        'estado_pago',
        'comprobante_imagen',
        'costo',
        'numero_boleta',
        'nicho_id',
        'usuario_id',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_final' => 'date',
        'estado_pago' => 'boolean',
        'costo' => 'decimal:2',
    ];

    // Relaciones
    public function nicho()
    {
        return $this->belongsTo(Nicho::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

