<?php

namespace App\Http\Controllers;

use App\tabla_informacion;
use Illuminate\Http\Request;

class TablaInformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $texto=tabla_informacion::find($id);
        return view('/InfoContacto/informaciones', compact('texto'));
    }

    public function editar($id)
    {
        $texto=tabla_informacion::find($id);
        return view('/InfoContacto/informaciones_edit', compact('texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tabla_informacion  $tabla_informacion
     * @return \Illuminate\Http\Response
     */
    public function show(tabla_informacion $tabla_informacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tabla_informacion  $tabla_informacion
     * @return \Illuminate\Http\Response
     */
    public function edit(tabla_informacion $tabla_informacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tabla_informacion  $tabla_informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $info=tabla_informacion::find($request->id);
        $info->texto=$request->nuevoTexto;
        $info->save();
        return redirect('/informaciones/'.$request->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tabla_informacion  $tabla_informacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(tabla_informacion $tabla_informacion)
    {
        //
    }
}
