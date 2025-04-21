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
        Schema::create('ocupantes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_fallecimiento');
            $table->text('causa_muerte');
            $table->foreignId('nicho_id')->constrained('nichos'); // FK hacia 'nichos'
            $table->foreignId('usuario_id')->constrained('usuarios'); // FK hacia 'usuarios'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocupantes');
    }
};
