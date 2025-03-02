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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla users
            // La forma más directa es usar foreignId y constrained:
            $table->foreignId('user_id')
                  ->constrained('users') // si no pones nada, por defecto busca 'users'
                  ->onDelete('cascade'); // si quieres que al borrar el user se borren sus registros

            // Campos adicionales que necesitas
            $table->date('fecha');
            $table->time('control_entrada')->nullable();
            $table->time('control_salida')->nullable();
            $table->integer('minutos_tarde')->default(0);
            $table->integer('minutos_extra')->default(0);
            $table->integer('balance_diario')->default(0);

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
