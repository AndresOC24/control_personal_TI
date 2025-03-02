<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioExcepcion extends Model
{
    use HasFactory;

    protected $table = 'horario_excepciones';

    protected $fillable = [
        'user_id',
        'fecha',
        'tiempo_entrada',
        'tiempo_salida',
        'motivo',
    ];

    /**
     * Relación: una excepción pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
