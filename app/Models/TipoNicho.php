<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoNicho extends Model
{
    use HasFactory;

    protected $table = 'tipo_nicho';

    protected $fillable = ['nombre'];

    // Relación: Un tipo de nicho tiene muchos nichos
    public function nichos()
    {
        return $this->hasMany(Nicho::class, 'tipo_nicho_id');
    }
}
