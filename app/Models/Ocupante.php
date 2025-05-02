<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupante extends Model
{
    use HasFactory;

    protected $table = 'ocupantes';

    protected $fillable = [
        'fecha_fallecimiento',
        'causa_muerte',
        'nicho_id',
        'usuario_id',
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

