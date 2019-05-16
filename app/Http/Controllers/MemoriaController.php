<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_memoria;
use Illuminate\Support\Arr;

class MemoriaController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
        $memorias = tabla_memoria::OrderBy('id')->get();
        return view('memorias/listing',['memorias'=>$memorias]);//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memorias = tabla_memoria::OrderBy('id')->get();
        return view('memorias/index',['memorias'=>$memorias]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        return view('memorias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $this->validate(request(),[
            'anio_memoria' => 'required',
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputMemoria' => 'required|file|mimes:jpeg,png,gif,webp,pdf',
        ]);
        $filenameMemoria = 'Memoria-' . $data['anio_memoria']  . '.' . $data['inputMemoria']->getClientOriginalExtension();
        $fileMemoria = $request->file('inputMemoria')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenameMemoria);
        $memoriaURL = \Storage::url($fileMemoria);

        $filenamePortada = 'Portada-' . $data['anio_memoria']  . '.' . $data['inputPortada']->getClientOriginalExtension();
        $filePortada = $request->file('inputPortada')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenamePortada);
        $portadaUrl = \Storage::url($filePortada);

        tabla_memoria::create([
            'year' => $data['anio_memoria'],
            'pdf' => $memoriaURL,
            'portada' => $portadaUrl
        ]);

        return $this->listing();
        //
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
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memoria = tabla_memoria::get()->find($id);
        return view('memorias/edit',compact("memoria"));//
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

        $data = request()->all();
        $this->validate(request(),[
            'anio_memoria' => 'required',
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputMemoria' => 'required|file|mimes:jpeg,png,gif,webp,pdf',
        ]);

        $memoria = tabla_memoria::findOrfail($id);
        if(Arr::exists($data, 'inputMemoria')){
            //Encontrar la direcion url guardada
            $url = $memoria->pdf;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenameMemoria = 'Memoria-' . $data['anio_memoria']  . '.' . $data['inputMemoria']->getClientOriginalExtension();
            $fileMemoria = $request->file('inputMemoria')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenameMemoria);
            $memoriaURL = \Storage::url($fileMemoria);
        }
        if(Arr::exists($data, 'inputPortada')){
            //Encontrar la direcion url guardada
            $url = $memoria->portada;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenamePortada = 'Portada-' . $data['anio_memoria']  . '.' . $data['inputPortada']->getClientOriginalExtension();
            $filePortada = $request->file('inputPortada')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenamePortada);
            $portadaUrl = \Storage::url($filePortada);
        }

        if(Arr::exists($data, 'inputPortada')){
            $memoria->update([
                'year' => $data['anio_memoria'],
                'pdf' => $memoriaURL,
                'portada' => $portadaUrl
            ]);
        }else{
            $memoria->update([
                'year' => $data['anio_memoria'],
                'pdf' => $memoriaURL,
            ]);
        }


        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memoria = tabla_memoria::get()->find($id);
        $directory = '/public/Memorias/'.$memoria['year'];
        \Storage::deleteDirectory($directory);
        $memoria->delete();
        return back();
    }
}
