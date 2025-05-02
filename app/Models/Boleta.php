<?php

namespace Database\Factories;

use App\Models\Boleta;
use App\Models\Contrato;
use App\Models\TipoBoleta;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoletaFactory extends Factory
{
    protected $model = Boleta::class;

    public function definition()
    {
        return [
            'numero_boleta' => $this->faker->unique()->numerify('BOLETA-####'),
            'contrato_id' => Contrato::factory(),
            'fecha_emision' => $this->faker->date(),
            'monto' => $this->faker->randomFloat(2, 100, 5000),
            'estado_pago' => $this->faker->boolean(),
            'tipo_boleta_id' => TipoBoleta::factory(),
        ];
    }
}
