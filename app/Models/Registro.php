<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $table = 'registros'; // o 'registro' si es tu nombre de tabla

    protected $fillable = [
        'user_id',
        'fecha',
        'control_entrada',
        'control_salida',
        'minutos_tarde',
        'minutos_extra',
        'balance_diario',
    ];

    /**
     * Relación: un registro pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
