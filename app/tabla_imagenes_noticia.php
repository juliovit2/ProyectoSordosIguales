<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_imagenes_noticia extends Model
{
    protected $fillable = [
        'imagen', 'noticiaid',
    ];
}
