<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'user' => 'admin',
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'fecha_nacimiento' => '1980-05-20',
                'dpi' => '1234567890101',
                'email' => 'admin@correo.com',
                'password' => Hash::make('1234'),
                'direccion' => 'Zona 1, Quetzaltenango',
                'telefono' => '12345678',
                'rol_id' => 1, // Administrador
                'genero_id' => 1, // Masculino
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user' => 'ayudante',
                'nombre' => 'María',
                'apellido' => 'García',
                'fecha_nacimiento' => '1995-08-15',
                'dpi' => '9876543210101',
                'email' => 'ayudante@correo.com',
                'password' => Hash::make('1234'),
                'direccion' => 'Zona 3, Quetzaltenango',
                'telefono' => '87654321',
                'rol_id' => 2, // Ayudante
                'genero_id' => 2, // Femenino
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
