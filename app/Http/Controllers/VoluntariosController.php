<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_persona;

class VoluntariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volutarios = tabla_persona::orderBy('id','ASC')->paginate();
        return view('InfoContacto.voluntarios',compact('voluntarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('noticia.create'); crear vita crear voluntario
    }



    public function store(NoticiaStoreRequest $request)
    {

        //validar
        if($request->has('video')) {
            $this->validate($request, [
                'video' => 'mimes:mp4,avi,mpeg,flv'
            ]);
            $video_path = $request->file('video')->store('public/videos/noticias');
        }
        $noticia = new tabla_noticia(array(
            'titulo' => $request->get('titulo'),
            'video' => substr ( $video_path , 7, strlen($video_path) -7)));

        $noticia->save();



        return redirect()->route('InfoContacto.voluntarios');
    }
}
