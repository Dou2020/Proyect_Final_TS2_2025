<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['nombre' => 'Hombre', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'Mujer', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
