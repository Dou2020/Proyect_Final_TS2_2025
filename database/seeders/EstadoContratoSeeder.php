<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar valores predeterminados en la tabla estado_contrato
        DB::table('estado_contrato')->insert([
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Vigente'],
            ['nombre' => 'En Gracia'],
            ['nombre' => 'Vencido'],
        ]);
    }
}
