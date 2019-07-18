<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    protected $fillable = [
        'name_donante', 'monto_donacion','fecha_donacion'
    ];

    public $timestamps = false;
}
