<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\RolesSeeder;
use Database\Seeders\GenerosSeeder;
use Database\Seeders\UsuariosSeeder;
use Database\Seeders\TipoNichoSeeder;
use Database\Seeders\EstadoNichoSeeder;
use Database\Seeders\NichoSeeder;
use Database\Seeders\TipoResponsable;
use Database\Seeders\EstadoContratoSeeder;
use Database\Seeders\TipoBoletaSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolesSeeder::class,
            GenerosSeeder::class,
            UsuariosSeeder::class,
            TipoNichoSeeder::class,
            EstadoNichoSeeder::class,
            NichoSeeder::class,
            TipoResponsable::class,
            EstadoContratoSeeder::class,
            TipoBoletaSeeder::class,
        ]);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
