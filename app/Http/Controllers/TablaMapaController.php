<?php

namespace App\Http\Controllers;

use App\tabla_informacion;
use App\tabla_mapa;
use Illuminate\Http\Request;

class TablaMapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texto=tabla_mapa::all();
        return view('/InfoContacto/redes_contacto',compact('texto'));
    }

    public function indexEd()
    {
        $texto1=tabla_mapa::find(1);
        $texto2=tabla_mapa::find(2);
        $texto3=tabla_mapa::find(3);
        $texto4=tabla_mapa::find(4);
        $texto5=tabla_mapa::find(5);
        $texto13=tabla_mapa::find(13);
        $texto6=tabla_mapa::find(6);
        $texto7=tabla_mapa::find(7);
        $texto8=tabla_mapa::find(8);
        $texto9=tabla_mapa::find(9);
        $texto10=tabla_mapa::find(10);
        $texto11=tabla_mapa::find(11);
        $texto12=tabla_mapa::find(12);
        $texto14=tabla_mapa::find(14);
        $texto15=tabla_mapa::find(15);
        return view('/InfoContacto/edit_redes',compact('texto1','texto2','texto3','texto4','texto5','texto6','texto7','texto8','texto13','texto9','texto10','texto11','texto12','texto14','texto15'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $texto=tabla_mapa::all();
        return view('/InfoContacto/edit_redes',compact('texto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tabla_mapa  $tabla_mapa
     * @return \Illuminate\Http\Response
     */
    public function show(tabla_mapa $tabla_mapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tabla_mapa  $tabla_mapa
     * @return \Illuminate\Http\Response
     */
    public function edit(tabla_mapa $tabla_mapa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tabla_mapa  $tabla_mapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        for ($x = 1; $x <= 15; $x++) {
            $info =tabla_mapa::find($x);
            $info->texto=$request->texto[$x-1];
            $info->save();
        }
        //$info->nombre=$request->nombre;
        return redirect('/redes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tabla_mapa  $tabla_mapa
     * @return \Illuminate\Http\Response
     */
    public function destroy(tabla_mapa $tabla_mapa)
    {
        //
    }
}
