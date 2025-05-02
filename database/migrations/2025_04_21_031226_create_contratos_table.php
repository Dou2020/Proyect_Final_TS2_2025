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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->foreignId('estado_contrato_id')->constrained('estado_contrato'); // FK hacia 'nichos'
            $table->text('comprobante_imagen')->nullable();
            $table->foreignId('ocupante_id')->constrained('ocupantes'); // Nuevo: FK hacia 'ocupantes'
            $table->foreignId('usuario_id')->constrained('usuarios'); // FK hacia 'usuarios'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
