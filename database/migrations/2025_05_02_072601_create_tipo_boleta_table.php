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
        Schema::create('tipo_boleta', function (Blueprint $table) {
            $table->id(); // ID del tipo de boleta
            $table->string('nombre')->unique(); // Nombre del tipo de boleta, como "Boleta de Pago"
            $table->text('descripcion')->nullable(); // Descripción adicional sobre el tipo de boleta
            $table->timestamps(); // Timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_boleta');
    }
};
