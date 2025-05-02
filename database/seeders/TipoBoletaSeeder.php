<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoBoletaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_boleta')->insert([
            ['nombre' => 'Inical', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Renovacion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Exhumacion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Multa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
