<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_usuario extends Model
{
    //ES IMPORTANTE ingresar los datos en el mismo orden
    protected $fillable = [
        'rut', 'correo', 'nombre','direccion', 'telefono', 'ciudad', 'clave', 'rol', 'cursando',
    ];
}
