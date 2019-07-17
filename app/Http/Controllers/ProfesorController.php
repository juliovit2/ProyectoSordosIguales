<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_persona;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = tabla_persona::orderBy('id','ASC')->paginate();
        $title = 'Listado de profesores';
        return view('Profesores.Index',compact('title','profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesor = new tabla_persona;
        return view('Profesores.Create', compact('profesor'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'required',
            'rut' => 'required',
            'correo' => 'required',
        ]);

        $profesor = new tabla_persona(array(
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'rut' => $request->get('rut'),
            'correo' => $request->get('correo'),
            'rol' => 'Profesor'
        ));

        $profesor->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = tabla_persona::find($id);
        return view('Profesores.Show',compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = tabla_persona::find($id);
        $data = array(
            'profesor_a_editar' => $profesor,
            "is_edit" => true);
        return view('Profesores.Edit',compact('profesor'));
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

        $profesor = array(
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'rut' => $request->get('rut'),
            'correo' => $request->get('correo'),
            'certificado' => $request->get('certificado'),
            'rol' => 'Profesor'
        );

        DB::table('tabla_personas')
            ->where('id', $id)
            ->update($profesor);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy(User $user){

        $user->delete();

        return redirect()->route('profesores.index');
    }
}
