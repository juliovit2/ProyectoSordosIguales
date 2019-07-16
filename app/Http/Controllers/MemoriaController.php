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
    public function interface()
    {
        $memorias = tabla_memoria::OrderBy('year','DESC')->get();
        return view('memorias/interface',['memorias'=>$memorias]);//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memorias = tabla_memoria::OrderBy('year','DESC')->get();
        return view('memorias/index',['memorias'=>$memorias]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $yearList = [];
        $yearsMemoria = tabla_memoria::get()->pluck('year')->toArray();
        $curYear = date("Y");
        for ($i = 0; $i < 5 ;$i++) {
            if (!in_array( $curYear - $i, $yearsMemoria)){
                array_push($yearList,$curYear - $i);
            }
        }

        //
        return view('memorias/create', compact('yearList'));
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
            'inputVideo' => 'required',
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputMemoria' => 'required|file|mimes:pdf',
        ]);
        $filenameMemoria = time() . $data['inputMemoria']->getClientOriginalName();
        $fileMemoria = $request->file('inputMemoria')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenameMemoria);
        $memoriaURL = \Storage::url($fileMemoria);

        if(Arr::exists($data, 'inputPortada')){
            $filenamePortada = time() . $data['inputPortada']->getClientOriginalName();
            $filePortada = $request->file('inputPortada')->storeAs('public/Memorias/'.$data['anio_memoria'],$filenamePortada);
            $portadaUrl = \Storage::url($filePortada);

            tabla_memoria::create([
                'year' => $data['anio_memoria'],
                'video' => $data{'inputVideo'},
                'pdf' => $memoriaURL,
                'portada' => $portadaUrl
            ]);
        }else{
            tabla_memoria::create([
                'year' => $data['anio_memoria'],
                'video' => $data['inputVideo'],
                'pdf' => $memoriaURL,
            ]);
        }

        return redirect()->route('memorias.index');
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
        $yearList = [];
        $actualYear = tabla_memoria::where('id',$id)->pluck('year')->first();
        $yearsMemoria = tabla_memoria::get()->pluck('year')->toArray();
        $curYear = date("Y");
        for ($i = 0; $i < 5 ;$i++) {
            if (!in_array( $curYear - $i, $yearsMemoria)){
                array_push($yearList,$curYear - $i);
            }else{
                if($curYear - $i == $actualYear){
                    array_push($yearList,$curYear - $i);
                }
            }
        }
        $memoria = tabla_memoria::get()->find($id);
        return view('memorias/edit',compact("memoria","yearList"));//
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
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputMemoria' => 'file|mimes:pdf',
        ]);

        $memoria = tabla_memoria::findOrfail($id);
        $yearActual = $memoria->year;
        $newYear = Arr::exists($data, 'anio_memoria') ?$data['anio_memoria'] : $memoria->year;
        $newPortada = $memoria->portada;
        $newMemoria = $memoria->pdf;
        $newVideo = $memoria->video;


        //Cambiar Video
        if(Arr::exists($data, 'inputVideo')){
            $newVideo = $data['inputVideo'];
        }

        //Cambiar Año
        if(Arr::exists($data, 'anio_memoria') && $data['anio_memoria'] != $memoria->year){
            if(!Arr::exists($data, 'inputMemoria')){
                $url = $memoria->pdf;
                $location = str_replace("/storage","public",$url);
                $newLocation = str_replace($yearActual,$data['anio_memoria'],$location);
                \Storage::move($location, $newLocation);
                $newMemoria = \Storage::url($newLocation);
            }

            if(!Arr::exists($data, 'inputPortada') && $newPortada != null){
                $url = $memoria->portada;
                $location = str_replace("/storage","public",$url);
                $newLocation = str_replace($yearActual,$data['anio_memoria'],$location);
                \Storage::move($location, $newLocation);
                $newPortada = \Storage::url($newLocation);
            }

        }

        //Reemplazar Memoria
        if(Arr::exists($data, 'inputMemoria')){
            //Encontrar la direcion url guardada
            $url = $memoria->pdf;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenameMemoria = time() . $data['inputMemoria']->getClientOriginalName();
            $fileMemoria = $request->file('inputMemoria')->storeAs('public/Memorias/'.$newYear,$filenameMemoria);
            $newMemoria = \Storage::url($fileMemoria);
        }

        //Reemplazar POrtada
        if(Arr::exists($data, 'inputPortada')){
            //Encontrar la direcion url guardada
            $url = $memoria->portada;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage","public",$url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenamePortada = time() . $data['inputPortada']->getClientOriginalName();
            $filePortada = $request->file('inputPortada')->storeAs('public/Memorias/'.$newYear,$filenamePortada);
            $newPortada = \Storage::url($filePortada);
        }

        $memoria->update([
            'year' => $newYear,
            'pdf' => $newMemoria,
            'portada' => $newPortada,
            'video' => $newVideo
        ]);

        return redirect()->route('memorias.index');
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
        return redirect()->route('memorias.index');
    }
}
