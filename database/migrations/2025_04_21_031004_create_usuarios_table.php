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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('user', 100)->unique();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->date('fecha_nacimiento');
            $table->string('dpi', 20)->unique();
            $table->string('email', 100)->unique();
            $table->text('password');
            $table->text('direccion');
            $table->string('telefono', 20);
            $table->boolean('estado')->default(true);
            $table->foreignId('genero_id')->constrained('generos'); // FK hacia 'generos'
            $table->foreignId('rol_id')->constrained('roles'); // FK hacia 'roles'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
