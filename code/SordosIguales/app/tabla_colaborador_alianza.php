<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_colaborador_alianza extends Model
{
    protected $fillable = [
        'tipo', 'logo', 'nombre',
    ];
}
