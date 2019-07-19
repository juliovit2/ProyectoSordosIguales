<?php

namespace App\Http\Controllers;

use App\tabla_imagenes_carrusel;
use App\tabla_imagenes_noticia;
use App\tabla_noticia;
use Illuminate\Http\Request;

class HomePublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function interface()
    {
        $imagenes = tabla_imagenes_carrusel::all();
        $noticias = tabla_noticia::OrderBy('id','DESC')->paginate(4);
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('Inicio/interface',compact('noticias','imagenes_noticia','imagenes'));
    }
}
