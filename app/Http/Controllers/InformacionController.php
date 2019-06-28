<?php

namespace App\Http\Controllers;

use App\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\tabla_persona;
use File;
use App\Http\Requests;
use Dropbox\Client;
use Dropbox\WriteMode;
use Illuminate\Support\Facades\Storage;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('InfoContacto.contacto');
    }

    public function info(){
        return view('InfoContacto.informacion');
    }

    public function enviarCorreo(Request $request){
        if($request->opcion!=2){
            $nombre=$request->name;
            $mensaje=$request->mensaje;
            $tipo="";
            switch ($request->op){
                case 1://consulta
                    $tipo='consulta';
                    $this->validate($request, [
                        'name'=>'required',
                    ]);
                    break;
                case 3://denuncias
                    $tipo='denuncia';
                    if($nombre=="" || $nombre==null){
                        $nombre="Anonimo";
                    }
                    break;
                case 4://otros
                    $tipo='otros';
                    $this->validate($request, [
                        'name'=>'required',
                    ]);
                    break;
            }

            $this->validate($request, [
                'email'=>'required',
                'mensaje'=> 'required_without:archivo',
            ]);
            if($request->archivo!=null){
                $this->validate($request,[
                    'archivo' => 'mimes:mp4|max:30720',
                ]);

                if($request->op==1){
                    $imageName = 'Consulta-'.time().'.'.request()->archivo->getClientOriginalExtension();
                }else{
                    if($request->op==3){
                        $imageName = 'Denuncia-'.time().'.'.request()->archivo->getClientOriginalExtension();
                    }else{
                        $imageName = 'Otro-'.time().'.'.request()->archivo->getClientOriginalExtension();
                    }
                }

                Storage::disk('dropbox')->putFileAs(
                    '/',
                    $request->file('archivo'),
                    $imageName
                );
            }else{
                $imageName="Mensaje sin archivo";
            }
            if($request->op==3){
                $datos=[$tipo,$request->tipoDenuncia,$nombre,$request->email,$mensaje,$imageName];
            }else{
                $datos=[$tipo,$nombre,$request->email,$mensaje,$imageName];
            }
            //$datos=[$tipo,$nombre,$request->email,$mensaje];
            //Mail::to($request->email)->send(new SendMailable($datos));
            try {
                Mail::to('naitsircnunez@gmail.com')->send(new SendMailable($datos));
                return 'Mensaje enviado';
            } catch(\Exception $e) {
                //return 'error';
                //return ['error',$e->getMessage()];
                return $e->getMessage(); // error in the above string (in this case, yes)!
            }
            //return back()->with('successMsg','Su mensaje fue enviado con exito')->with('archivo',$filename);
            //return view('contacto')->with('successMsg','Su mensaje fue enviado con exito');
        }else{//voluntario
            $this->validate($request, [
                'name'=>'required',
                'rut'=>'required',
                'email'=> 'required',
                'ciudad'=>'required',
                'phone'=>'required',
                'profesion'=>'required',
                'archivo'=>'required'
            ]);
            $this->validate($request,[
                'archivo' => 'required|mimes:pdf',
            ]);
            $imageName = time().'.'.request()->archivo->getClientOriginalExtension();
            $request->archivo->move(public_path('/temp'), $imageName);
            $datos=[$request->name,$request->rut,$request->email,$request->ciudad,$request->phone,$request->profesion,$imageName];
//            $datos=[$request->name,$request->rut,$request->email,$request->ciudad,$request->phone,$request->profesion,$request->archivo];
            //Mail::to('naitsircnunez@gmail.com')->send(new SendMailable($datos));
            try {
                Mail::to('naitsircnunez@gmail.com')->send(new SendMailable($datos));
                File::delete(public_path('/temp/'.$imageName));
                return 'Mensaje enviado';
            }catch(\Exception $e) {
                return $e->getMessage();
                //return ['error',$e->getMessage()];
                //alert($e->getMessage()); // error in the above string (in this case, yes)!
            }
            //return view('contacto')->with('successMsg','Su mensaje fue enviado con exito');
        }
    }

    public function subirArchivo(Request $request)
    {

        if($request->op!="2"){
            $this->validate($request,[
                'archivo' => 'required|mimes:mp4|max:30720',
            ]);
            if($request->op=="1"){
                $imageName = 'Consulta-'.time().'.'.request()->archivo->getClientOriginalExtension();
            }else{
                if($request->op=="3"){
                    $imageName = 'Denuncia-'.time().'.'.request()->archivo->getClientOriginalExtension();
                }else{
                    $imageName = 'Otro-'.time().'.'.request()->archivo->getClientOriginalExtension();
                }
            }
            Storage::disk('dropbox')->putFileAs(
                '/',
                $request->file('archivo'),
                $imageName
            );
            return $imageName;
        }else{
            $this->validate($request,[
                'archivo' => 'required|mimes:pdf',
            ]);
            $imageName = time().'.'.request()->archivo->getClientOriginalExtension();
            $request->archivo->move(public_path('/temp'), $imageName);
            return $imageName;
        }
//        $request->archivo->move(public_path('/temp'), $imageName);
//        return $imageName;
        //return back()->with('success','You have successfully upload image.')->with('archivo',$imageName);
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
