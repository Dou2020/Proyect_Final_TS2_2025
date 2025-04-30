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
        Schema::create('nichos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->foreignId('tipo_nicho_id')->constrained('tipo_nicho')->onDelete('restrict');
            $table->string('calle', 50);
            $table->string('avenida', 50);
            $table->foreignId('estado_nicho_id')->constrained('estado_nicho')->onDelete('restrict');
            $table->boolean('personaje_historico')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nichos');
    }
};
