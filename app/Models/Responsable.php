<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsables';

    protected $fillable = [
        'ocupante_id',
        'usuario_id',
        'tipo_responsable_id', // opcional si quieres guardar relación con el ocupante
    ];

    public function tipoResponsable()
    {
        return $this->belongsTo(TipoResponsable::class, 'tipo_responsable_id');
    }

    // Relación con el ocupante
    public function ocupante()
    {
        return $this->belongsTo(Ocupante::class);
    }

    // Relación con el usuario (quien actúa como responsable)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
