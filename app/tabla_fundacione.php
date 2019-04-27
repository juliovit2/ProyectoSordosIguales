<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_fundacione extends Model
{
    protected $fillable = [
        'nombre', 'region', 'correo', 'logo', 'numero',
    ];
}
