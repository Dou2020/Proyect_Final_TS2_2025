<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $table = 'boleta';

    protected $fillable = [
        'numero_boleta',
        'contrato_id',
        'tipo_boleta_id',
        'fecha_emision',
        'monto',
        'estado_pago',
    ];

    // Relación con el contrato
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    // Relación con tipo de boleta
    public function tipoBoleta()
    {
        return $this->belongsTo(TipoBoleta::class);
    }
}

