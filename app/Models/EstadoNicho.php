<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoNicho extends Model
{
    use HasFactory;

    protected $table = 'estado_nicho';

    protected $fillable = ['nombre'];

    // Relación: Un estado de nicho tiene muchos nichos
    public function nichos()
    {
        return $this->hasMany(Nicho::class, 'estado_nicho_id');
    }
}
