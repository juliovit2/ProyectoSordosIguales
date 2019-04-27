<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_usuario_nota extends Model
{
    protected $fillable = [
        'nota', 'usuarioid', 'cursoid', 'notaid',
    ];
}
