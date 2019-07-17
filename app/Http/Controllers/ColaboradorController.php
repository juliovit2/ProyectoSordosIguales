<?php

namespace App\Http\Controllers;

use App\tabla_colaborador_alianza;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $this->validate(request(),[
            'inputNombre' => 'required',
            'inputURL' => 'required',
            'inputLogo' => 'required|file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
        ]);
        $filenameLogo = time() . $data['inputLogo']->getClientOriginalName();
        $fileLogo = $request->file('inputLogo')->storeAs('public/Colaboradores/',$filenameLogo);
        $logoURL = \Storage::url($fileLogo);

        tabla_colaborador_alianza::create([
            'nombre' => $data['inputNombre'],
            'logo' => $logoURL,
            'url' => $data['inputURL'],
        ]);

        return redirect()->route('colaboradores.index');
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
        $colaborador = tabla_colaborador_alianza::get()->find($id);
        return view('colaboradores/edit', compact("colaborador"));//
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
        $data = request()->all();
        $this->validate(request(),[
            'inputNombre' => 'required',
            'inputURL' => 'required',
            'inputLogo' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
        ]);

        $colaborador = tabla_colaborador_alianza::findOrfail($id);

        $logoURL = $colaborador->logo;


        //Reemplazar Portada
        if (Arr::exists($data, 'inputLogo')) {
            //Encontrar la direcion url guardada
            $url = $colaborador->logo;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage", "public", $url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenameLogo = time() . $data['inputLogo']->getClientOriginalName();
            $fileLogo = $request->file('inputLogo')->storeAs('public/Colaboradores/',$filenameLogo);
            $logoURL = \Storage::url($fileLogo);
        }


        $colaborador->update([
            'nombre' => $data['inputNombre'],
            'logo' => $logoURL,
            'url' => $data['inputURL'],
        ]);

        return redirect()->route('colaboradores.index');
        //
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
        $colab = tabla_colaborador_alianza::get()->find($id);
        $direccion = $colab->logo;
        $location = str_replace("/storage","public",$direccion);
        \Storage::delete($location);
        $colab->delete();
        return redirect()->route('colaboradores.index');
        //
    }
}
