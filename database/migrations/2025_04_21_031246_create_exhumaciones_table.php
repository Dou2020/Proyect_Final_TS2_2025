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
        Schema::create('exhumaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->text('motivo');
            $table->foreignId('ocupante_anterior_id')->constrained('ocupantes'); // FK hacia 'ocupantes'
            $table->foreignId('nuevo_ocupante_id')->constrained('ocupantes'); // FK hacia 'ocupantes'
            $table->foreignId('usuario_id')->constrained('usuarios'); // FK hacia 'usuarios'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhumaciones');
    }
};
