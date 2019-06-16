<?php

namespace App\Http\Controllers;

use App\tabla_preguntas_frecuente;
use Illuminate\Http\Request;


class FaqController extends Controller
{
    public function index()
    {   $pregunta= tabla_preguntas_frecuente::all();
        $respuesta=tabla_preguntas_frecuente::all();
        return view('InfoContacto.index_faq',compact('pregunta','respuesta'));
    }

    public function create()
    {
        return view('InfoContacto.create_faq');
    }

    public function showFaq($id){
        $pregunta = tabla_preguntas_frecuenta::find($id);
        $respuesta =tabla_preguntas_frecuente::all();
        return view('InfoContacto.show_faq',compact('pregunta','respuesta'));
    }



}
