<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_preguntas_frecuente extends Model
{
    protected $fillable = [
        'tipo','pregunta','respuesta',
    ];
}
