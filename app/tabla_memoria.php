<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_memoria extends Model
{
    protected $fillable = [
        'year','pdf','portada','video'
    ];
}
