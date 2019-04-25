<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_usuario_curso extends Model
{
    protected $fillable = [
      'asistencia', 'estado', 'usuarioid', 'cursoid',
    ];
}
