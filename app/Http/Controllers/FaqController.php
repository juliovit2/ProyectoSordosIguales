<?php

namespace App\Http\Controllers;

use App\tabla_preguntas_frecuente;
use Illuminate\Http\Request;


class FaqController extends Controller
{
    public function index()
    {   $pregunta= tabla_preguntas_frecuente::all();
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
        $editarFaq = tabla_preguntas_frecuente::find($id);
        return view('InfoContacto.edit_faq',compact('editarFaq'));
    }

    public function update(Request $request, $id)
    {
       /* $respuesta_path = null;
        $faqEditada = array(
            'tipo' => $request->get('tipo'),
            'pregunta' => $request->get("pregunta"),
            'respuesta' => substr ( $respuesta_path , 7, strlen($respuesta_path) -7));

        DB::table('tabla_preguntas_frecuente')
            ->where('id', $id)
            ->update($faqEditada);

        return redirect()->route('faq.index');*/
        $this->validate($request,['nombre'=>"algo",'pregunta'=>'required','respuesta'=>'required']);
        tabla_preguntas_frecuente::find($id)->update($request->all());
        return redirect()->route('faq.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function store(request $request)
    {
        $pregunta=new tabla_preguntas_frecuente();
//        $this->validate($request,[
//          'tipo'=>'nullable',
//        ]);


        $pregunta->tipo="algo";
        $pregunta->pregunta=$request->pregunta;
        $pregunta->respuesta=substr($request->video, 32, strlen($request->video));
        $pregunta->save();
        return $this->show();
        //return redirect()->route('faq/show');
    }

    public function destroy($id)
    {
        $eliminarFaq = tabla_preguntas_frecuente::find($id);
        $eliminarFaq->delete();

        return redirect()->route('faq.index');
    }


}
