<?php

namespace App\Http\Controllers;

use App\tabla_imagenes_noticia;
use App\tabla_noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = tabla_noticia::OrderBy('id','DESC')->paginate(4);
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('home', compact('noticias','imagenes_noticia'));
    }
}