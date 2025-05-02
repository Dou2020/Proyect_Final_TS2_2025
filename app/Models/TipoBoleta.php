<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBoleta extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'tipo_boleta';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación con el modelo Boleta
    public function boletas()
    {
        return $this->hasMany(Boleta::class);
    }
}
