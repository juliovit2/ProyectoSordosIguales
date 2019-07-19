<?php

namespace App\Http\Controllers;

use App\Home;
use App\tabla_imagenes_carrusel;
use App\tabla_imagenes_noticia;
use App\tabla_noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $imagenes = tabla_imagenes_carrusel::all();
        return view('Inicio/index', ['imagenes' => $imagenes]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Inicio/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $this->validate(request(), [
            'inputImagen' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048|required',
        ]);
        $filenameImagen = time() . $data['inputImagen']->getClientOriginalName();
        $fileimagen = $request->file('inputImagen')->storeAs('public/Carrusel',$filenameImagen);
        $portadaUrl = \Storage::url($fileimagen);
        tabla_imagenes_carrusel::create([
            'imagen' => $portadaUrl
        ]);
        return redirect()->route('carrusel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $imagenes = tabla_imagenes_carrusel::get()->find($id);
        return view('Inicio/edit', compact("imagenes"));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $this->validate(request(), [
            'inputImagen' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
        ]);
        $imagen = tabla_imagenes_carrusel::findOrfail($id);
        $newImagen = $imagen->imagen;

        if (Arr::exists($data,'inputImagen')) {
            //Encontrar la direcion url guardada
            $url = $imagen->imagen;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage", "public", $url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenameImagen = time() . $data['inputImagen']->getClientOriginalName();
            $fileImagen = $request->file('inputImagen')->storeAs('public/Carrusel/', $filenameImagen);
            $newImagen = \Storage::url($fileImagen);
        }
        $imagen->update([
            'imagen' => $newImagen,
        ]);
        return redirect()->route('carrusel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return Response
     */
    public function destroy($id)
    {
        $imagen = tabla_imagenes_carrusel::get()->find($id);
        $url = $imagen->imagen;
        $location = str_replace("/storage", "public", $url);
        \Storage::delete($location);
        $imagen->delete();

        return redirect()->route('carrusel.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
