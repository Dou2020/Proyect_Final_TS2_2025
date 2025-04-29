<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'user',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'dpi',
        'email',
        'password',
        'direccion',
        'telefono',
        'rol_id',
        'genero_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación con rol
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    // Relación con género
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}

