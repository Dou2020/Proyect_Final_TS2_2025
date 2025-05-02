<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoContrato extends Model
{
    use HasFactory;

    protected $table = 'estado_contrato';

    protected $fillable = ['nombre'];

    // Relación: Un estado de nicho tiene muchos nichos
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'estado_contrato_id');
    }
}
