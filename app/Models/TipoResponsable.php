<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoResponsable extends Model
{
    use HasFactory;

    protected $table = 'tipo_responsable';

    protected $fillable = ['nombre'];

    // Un tipo de parentesco puede tener muchos responsables
    public function responsables()
    {
        return $this->hasMany(Responsable::class);
    }
}

