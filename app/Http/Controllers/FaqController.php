<?php

namespace App\Http\Controllers;

use App\tabla_preguntas_frecuente;
use Illuminate\Http\Request;


class FaqController extends Controller
{
    public function index()
    {  // $pregunta= tabla_preguntas_frecuente::all();
        $pregunta=tabla_preguntas_frecuente::orderBy('id','ASC')->get();
        return view('InfoContacto.index_faq',compact('pregunta'));
    }

    public function create()
    {
        return view('InfoContacto.create_faq');
    }

    public function show(){
        $pregunta =tabla_preguntas_frecuente::all();
        return view('InfoContacto.show_faq',compact('pregunta'));
    }


    public function edit($id)
    {
        $pregunta = tabla_preguntas_frecuente::find($id);
        return view('InfoContacto.edit_faq',compact('pregunta'));
    }

    public function update(Request $request, $id)
    {
       $this->validate($request,['tipo'=>'algo','pregunta'=>'required','respuesta'=>'required']);
        tabla_preguntas_frecuente::find($id)->update($request->all());
        return redirect()->route('faq.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function store(request $request)
    {
        $pregunta=new tabla_preguntas_frecuente();
        $pregunta->pregunta=$request->pregunta;
        $pregunta->respuesta=substr($request->video, 32, strlen($request->video));
        $pregunta->save();
        return $this->show();
    }

    public function destroy($id)
    {
        tabla_preguntas_frecuente::find($id)->delete();

        return redirect()->route('faq.index')->with('success','Registro actualizado satisfactoriamente');
    }


}
