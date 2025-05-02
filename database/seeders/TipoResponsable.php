<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoResponsable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_responsable')->insert([
            ['nombre' => 'Titular', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Vista', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
