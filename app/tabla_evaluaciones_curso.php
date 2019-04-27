<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_evaluaciones_curso extends Model
{
    protected $fillable = [
        'nombreEvaluacion', 'cursoid',
    ];
}
