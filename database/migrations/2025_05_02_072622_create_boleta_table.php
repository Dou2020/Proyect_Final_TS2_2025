<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boleta', function (Blueprint $table) {
            $table->id(); // ID de la boleta
            $table->string('numero_boleta')->unique(); // Número de boleta único
            $table->foreignId('contrato_id')->constrained('contratos')->onDelete('cascade'); // Relación con el contrato
            $table->foreignId('tipo_boleta_id')->constrained('tipo_boleta')->onDelete('cascade'); // Relación con tipo_boletas
            $table->date('fecha_emision'); // Fecha de emisión de la boleta
            $table->decimal('monto', 10, 2); // Monto de la boleta
            $table->boolean('estado_pago')->default(false); // Estado de pago de la boleta (pendiente o pagado)
            $table->timestamps(); // Timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boleta');
    }
};
