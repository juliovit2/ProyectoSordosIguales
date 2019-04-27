<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_curso extends Model
{
    protected $fillable = [
        'nombre', 'profesorid',
    ];
}
