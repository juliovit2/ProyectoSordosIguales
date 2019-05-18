<?php

namespace App\Http\Controllers;

use App\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\tabla_persona;
use File;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacto');
    }

    public function info(){
        return view('informacion');
    }

    public function enviarCorreo(Request $request){
        if($request->opcion!=2){
            $nombre=$request->name;
            $mensaje=$request->mensaje;
            $tipo="";
            switch ($request->opcion){
                case 1://consulta
                    $tipo='consulta';

                    //puede enviar mensajes vacios
                    $this->validate($request, [
                        'name'=>'required',
                        'email'=>'required',
                        'mensaje'=> 'required',
                        'file'=>'required'
                ]);
                    break;
                case 3://denuncias
                    $tipo='denuncia';
                    $this->validate($request, [
                        'name'=>'required',
                        'email'=>'required',
                        'mensaje'=> 'required',
                        'file'=>'required'
                    ]);
                    break;
                case 4://otros
                    $tipo='otros';
                    $this->validate($request, [
                        'name'=>'required',
                        'email'=>'required',
                        'mensaje'=> 'required',
                        'file'=>'required'
                    ]);
                    break;
            }

                $filename = time() . '.' . $request->file->getClientOriginalExtension();
                $path=public_path('/temp');
                $request->file->move($path,$filename);
                $datos=[$request->name,$request->email2,$mensaje,$filename];
                Mail::to($request->email)->send(new SendMailable($datos));



            return view('contacto')->with('successMsg','Su mensaje fue enviado con exito');
        }else{//voluntario

            $this->validate($request, [
                'name2'=>'required',
                'rut'=>'required',
                'email2'=> 'required',
                'ciudad'=>'required',
                'phone'=>'required',
                'profesion'=>'required',
                'file'=>'required'
            ]);


            $filename = time() . '.' . $request->file->getClientOriginalExtension();
            $path=public_path('/temp');
            $request->file->move($path,$filename);
            $datos=[$request->name2,$request->rut,$request->email2,$request->ciudad,$request->phone,$request->profesion,$filename];
            //Mail::to('naitsircnunez@gmail.com')->send(new SendMailable($datos));
            Mail::to($request->email2)->send(new SendMailable($datos));
            return view('contacto')->with('successMsg','Su mensaje fue enviado con exito');
        }
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
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function show(Informacion $informacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Informacion $informacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informacion $informacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informacion $informacion)
    {
        //
    }
}