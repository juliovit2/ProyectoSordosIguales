<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_directorio extends Model
{
    protected $fillable = [
        'imagen','cargo','nombre',
    ];
}
