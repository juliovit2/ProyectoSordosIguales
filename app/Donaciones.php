<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    protected $fillable = [
        'name_donante', 'monto_donacion'
    ];


}
