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
        Schema::create('horario_trabajo', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla users
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
                  // onDelete('cascade') es opcional:
                  // al borrar un usuario, se borran en cascada sus horarios

            // Campos adicionales que necesitas
            $table->string('dia'); // Ej: "Lunes", "Martes", etc.
            $table->time('tiempo_entrada');
            $table->time('tiempo_salida');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_trabajo');
    }
};
