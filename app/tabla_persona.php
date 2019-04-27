<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_persona extends Model
{
    protected $fillable = [
        'nombre', 'telefono', 'rut', 'correo', 'certificado', 'rol',
    ];
}
