<?php

namespace App\Http\Controllers;

use App\Donaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function interface()
    {
        return view('Donaciones/interface');//
    }

    public function index()
    {
        $donaciones = Donaciones::OrderBy('id')->get();
        return view('Donaciones/index',['donaciones'=>$donaciones]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Donaciones/create');//
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
            'name_donante' => 'string',
            'monto_donacion' => 'required',
            'fecha_donacion' => 'date| required',
        ]);
        if(Arr::exists($data, 'name_donante')){
            Donaciones::create([
                'name_donante' => $data['name_donante'],
                'monto_donacion' => $data{'monto_donacion'},
                'fecha_donacion' => $data{'fecha_donacion'},
            ]);
        }else{
            Donaciones::create([
                'name_donante' => 'Anonimo',
                'monto_donacion' => $data{'monto_donacion'},
                'fecha_donacion' => $data{'fecha_donacion'},
            ]);
        }

        return redirect()->route('donaciones.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Donaciones $donaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donaciones = Donaciones::get()->find($id);
        return view('donaciones/edit',compact("donaciones"));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_donante'=>'required',
            'monto_donacion'=>'required',
            'fecha_donacion'=>'required'
        ]);

        $donaciones = Donaciones::findOrfail($id);
        $donaciones->name_donante =  $request->get('name_donante');
        $donaciones->monto_donacion = $request->get('monto_donacion');
        $donaciones->fecha_donacion = $request->get('fecha_donacion');

        $donaciones->save();

        return redirect()->route('donaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donaciones = Donaciones::get()->find($id);
        $donaciones->delete();
        return redirect()->route('donaciones.index');
    }
}
