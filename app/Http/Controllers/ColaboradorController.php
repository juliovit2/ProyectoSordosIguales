<?php

namespace App\Http\Controllers;

use App\tabla_colaborador_alianza;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colabs = tabla_colaborador_alianza::get();
        return view('colaboradores/index',['colabs'=>$colabs]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaboradores/create');
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
            'inputNombre' => 'required',
            'inputURL' => 'required',
            'inputLogo' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
        ]);
        $filenameLogo = time() . $data['inputLogo']->getClientOriginalName();
        $fileLogo = $request->file('inputLogo')->storeAs('public/Colaboradores/',$filenameLogo);
        $logoURL = \Storage::url($fileLogo);

        tabla_colaborador_alianza::create([
            'year' => $data['anio_memoria'],
            'video' => $data['inputVideo'],
            'pdf' => $memoriaURL,
        ]);

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
