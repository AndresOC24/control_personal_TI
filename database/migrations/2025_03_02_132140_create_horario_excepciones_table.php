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
        Schema::create('horario_excepciones', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla users
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Campos específicos de la excepción
            $table->date('fecha'); // Día en que aplica el horario especial
            $table->time('tiempo_entrada');
            $table->time('tiempo_salida');
            $table->string('motivo')->nullable(); // Motivo o comentario opcional

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_excepciones');
    }
};
