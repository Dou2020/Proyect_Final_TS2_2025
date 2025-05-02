<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NichoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nichos')->insert([
            [
                'codigo' => 'NCH-001',
                'tipo_nicho_id' => 1,
                'calle' => '1',
                'avenida' => 'A',
                'estado_nicho_id' => 1, // Disponible
                'personaje_historico' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo' => 'NCH-002',
                'tipo_nicho_id' => 1,
                'calle' => '2',
                'avenida' => 'B',
                'estado_nicho_id' => 1, // Disponible
                'personaje_historico' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo' => 'NCH-003',
                'tipo_nicho_id' => 1,
                'calle' => '3',
                'avenida' => 'C',
                'estado_nicho_id' => 1, // Disponible
                'personaje_historico' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo' => 'NCH-004',
                'tipo_nicho_id' => 2,
                'calle' => '1',
                'avenida' => 'D',
                'estado_nicho_id' => 1, // Disponible
                'personaje_historico' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'codigo' => 'NCH-005',
                'tipo_nicho_id' => 2,
                'calle' => '4',
                'avenida' => 'A',
                'estado_nicho_id' => 1, 
                'personaje_historico' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
