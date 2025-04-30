<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoNichoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_nicho')->insert([
            ['nombre' => 'Niño', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Adulto', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
