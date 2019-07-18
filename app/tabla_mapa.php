<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_mapa extends Model
{
    protected $fillable = [
        'id','nombre','texto',
    ];
}
