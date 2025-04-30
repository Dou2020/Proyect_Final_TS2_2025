<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstadoNichoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_nicho')->insert([
            ['nombre' => 'Disponible', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Ocupado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Proceso Exhumación', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Historico', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
