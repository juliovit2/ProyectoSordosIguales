<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_noticia;
use App\tabla_imagenes_noticia;
use App\Http\Requests\NoticiaStoreRequest;

use Illuminate\Support\Facades\DB;
use App\Request\TickerFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NoticiaPublicController extends Controller
{
    public function public_index() {
        $noticias = tabla_noticia::orderBy('id','DESC')->paginate(6);
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.public_index',compact('noticias','imagenes_noticia'));
    }

    private function strip_bom($string)
    {
        if (substr($string, 0, 3) === "\xEF\xBB\xBF") {
            $string = substr($string, 3);
        }
        return $string;
    }

    public function show($id)
    {
        $tabla_noticia = tabla_noticia::find($id);
        $tabla_imagenes_noticia = tabla_imagenes_noticia::all();
        $is_edit = false;
        return view('noticia.show',compact('tabla_noticia','tabla_imagenes_noticia', 'is_edit'));
    }
}
