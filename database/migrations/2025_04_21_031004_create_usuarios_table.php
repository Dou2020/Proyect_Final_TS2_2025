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
            $table->string('user', 100)->unique()->nullable();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->date('fecha_nacimiento');
            $table->string('dpi', 20)->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->text('password')->nullable();
            $table->text('direccion');
            $table->string('telefono', 20)->nullable();
            $table->boolean('estado')->default(true);
            $table->foreignId('genero_id')->constrained('generos'); // FK hacia 'generos'
            $table->foreignId('rol_id')->constrained('roles')->nullable(); // FK hacia 'roles'
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
