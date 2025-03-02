<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioTrabajo extends Model
{
    use HasFactory;

    protected $table = 'horario_trabajo'; // Ajusta si usas otro nombre

    protected $fillable = [
        'user_id',
        'dia',
        'tiempo_entrada',
        'tiempo_salida',
    ];

    /**
     * Relación: un horario de trabajo pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
