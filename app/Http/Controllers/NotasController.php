<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasController extends Controller
{

    public function ingresar(Request $request){

        $rut_alumno = request()->IDalumno;
        return $rut_alumno;
    }
}
