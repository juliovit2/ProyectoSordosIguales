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
        $voluntarios = tabla_persona::orderBy('id','ASC')->paginate();
        return view('InfoContacto.index_voluntarios',compact('voluntarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('InfoContacto.create_voluntarios');
    }



    public function store(Request $request)
    {

        $this ->validate($request,[
            'nombre' => 'required',
            'telefono' => 'required',
            'rut' => 'required',
            'correo' => 'required',
            'certificado' => 'required'
        ]);

        //validar
        $voluntarios = new tabla_persona(array(
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'rut' => $request->get('rut'),
            'correo' => $request->get('correo'),
            'certificado' => $request->get('certificado'),
            ));
        $voluntarios->roles()->attach('voluntarios');
        $voluntarios->save();


        return redirect()->route('admin/voluntarios');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabla_persona = tabla_persona::find($id);
        return view('InfoContacto.index_voluntarios',compact('tabla_persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntario_a_editar = tabla_persona::find($id);
        $data = array(
            'voluntario_a_editar' => $voluntario_a_editar,
            "is_edit" => true);

        return view('InfoContacto.create_voluntarios')->with('data', $data);
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

        $voluntarioEditado = array(
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'rut' => $request->get('rut'),
            'correo' => $request->get('correo'),
            'certificado' => $request->get('certificado'),
            'rol' => $request->get('rol')
        );

        DB::table('tabla_persona')
            ->where('id', $id)
            ->update($voluntarioEditado);

        return redirect()->route('InfoContacto.index_voluntarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voluntario_a_eliminar = tabla_persona::find($id);
        $voluntario_a_eliminar->delete();

        return redirect()->route('InfoContacto.index_voluntarios');
    }
}
