<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_noticia;
use App\tabla_imagenes_noticia;
use App\Http\Requests\NoticiaStoreRequest;

use App\Request\TickerFormRequest;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = tabla_noticia::orderBy('id','ASC')->paginate();
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.index',compact('noticias','imagenes_noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        return view('noticia.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaStoreRequest $request)
    {
        $video_path = null;
        //validar
        if($request->has('video')) {
            $video_path = $request->file('video')->store('public/videos/noticias');
        }
        $noticia = new tabla_noticia(array(
            'titulo' => $request->get('titulo'),
            'contenido' => $request->get('contenido'),
            'video' => substr ( $video_path , 7, strlen($video_path) -7)));

        $noticia->save();

        if($request->has('imagenes')) {
            foreach ($request->imagenes as $imagen) {
                $image_path = $imagen->store('public/imagenes/noticias');
                $imagen_noticia = new tabla_imagenes_noticia(array(
                    'imagen' =>  substr ( $image_path , 7, strlen($image_path) -7),
                    'noticiaid' => $noticia->id
                ));
                $imagen_noticia->save();
            }
        }

        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tabla_noticia = tabla_noticia::find($id);
        $tabla_imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.show',compact('tabla_noticia','tabla_imagenes_noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
