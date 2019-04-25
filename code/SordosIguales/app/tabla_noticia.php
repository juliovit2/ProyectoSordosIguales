<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_noticia extends Model
{
    protected $fillable = [
        'video', 'titulo', 'contenido', 'fecha',
    ];
}
