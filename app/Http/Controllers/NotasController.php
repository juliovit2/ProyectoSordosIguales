<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;


class NotasController extends Controller
{
    public function indiceNotas(User $user){
        $usuarios = DB::select('select name, rut, nota, tabla_usuario_notas.id, tabla_cursos.nombre  from users, tabla_usuario_notas, tabla_cursos where users.id = tabla_usuario_notas.usuarioid and tabla_cursos.id = tabla_usuario_notas.cursoid');
        return view('Plataforma/NotasIndex',compact('usuarios', 'user'));
    }

    public function ingresar(Request $request){

        $rut_alumno = request()->IDalumno;
        $rut = DB::table('users')->where('rut', $rut_alumno)->value('rut');
        //dd($rut);

        $nombre_curso = request()->IDcurso;
        $curso = DB::table('tabla_cursos')->where('nombre', $nombre_curso)->value('nombre');

        $tipo_evaluacion = request()->tipoevaluacion;
        $evaluacion = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $tipo_evaluacion)->value('nombreEvaluacion');

        $nota = request()->nota;

        if($rut_alumno != $rut){
            return back()->with('error1','El Estudiante no existe');
        }else{
            if($nombre_curso != $curso){
                return back()->with('error2','El Curso no existe');
            }else{
                if($tipo_evaluacion != $evaluacion ) {
                    return back()->with('error3','Tipo de EvaluaciÃ³n no corresponde');
                }else{

                    $nota = str_replace(",",".",$nota);

                    if(is_numeric($nota)){

                        if($nota < 10){

                            if($nota >= 1 && $nota <= 7) {
                                $nota = $nota*10;
                                $alumnoID = DB::table('users')->where('rut', $rut)->value('id');
                                $cursoID = DB::table('tabla_cursos')->where('nombre', $nombre_curso)->value('id');
                                $notaID = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $evaluacion)->value('id');
                                //dd($nota, $alumnoID, $cursoID, $notaID);

                                DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                                DB::table('tabla_usuario_notas')->insert(
                                    ['nota' => $nota, 'usuarioid' => $alumnoID, 'cursoid' => $cursoID, 'notaid' => $notaID]
                                );
                                DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

                                return back()->with('exito','Nota ingresada correctamente');

                            }else{
                                return back()->with('error4','Formato de Nota incorrecto');
                            }

                        }else{

                            if($nota >= 10 && $nota <= 70) {

                                $alumnoID = DB::table('users')->where('rut', $rut)->value('id');
                                $cursoID = DB::table('tabla_cursos')->where('nombre', $nombre_curso)->value('id');
                                $notaID = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $evaluacion)->value('id');
                                //dd($nota, $alumnoID, $cursoID, $notaID);

                                DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                                DB::table('tabla_usuario_notas')->insert(
                                    ['nota' => $nota, 'usuarioid' => $alumnoID, 'cursoid' => $cursoID, 'notaid' => $notaID]
                                );
                                DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

                                return back()->with('exito','Nota ingresada correctamente');

                            }else{
                                return back()->with('error4','Formato de Nota incorrecto');
                            }

                        }

                    }

                    return back()->with('error4','Formato de Nota incorrecto');

                }
            }
        }
    }

    public function modificar(Request $request){
        $users = User::all();
        $title = 'Listado de notas';
        return view('Plataforma/ModificarNotas', compact('title', 'users'));
    }

    public function modificarConector($idNota){

        return view('Plataforma/ModificarNotasIndex',compact('idNota'));

    }

    public function modificarIndex(Request $request, $idNota){

        $request->notaAlumno = str_replace(",",".",$request->notaAlumno);

        if(is_numeric($request->notaAlumno) ){

            if($request->notaAlumno < 10){

                if($request->notaAlumno >= 1 && $request->notaAlumno <= 7){

                    $request->notaAlumno = $request->notaAlumno*10;

                    DB::table('tabla_usuario_notas')
                        ->where('id', $idNota)
                        ->update(['nota' => $request->notaAlumno]);

                    return redirect('ModificarNotas');
                }else{
                    return back()->with('error','Formato de Nota Incorrecto');
                }

            }else{

                if($request->notaAlumno >= 10 && $request->notaAlumno <= 70){

                    DB::table('tabla_usuario_notas')
                        ->where('id', $idNota)
                        ->update(['nota' => $request->notaAlumno]);

                    return redirect('ModificarNotas');
                }else{
                    return back()->with('error','Formato de Nota Incorrecto');
                }

            }


        }

        return back()->with('error','Formato de Nota Incorrecto');

    }


    public function eliminar($idNota){

        DB::table('tabla_usuario_notas')->where('id', '=', $idNota)->delete();

        return back();

    }

}
