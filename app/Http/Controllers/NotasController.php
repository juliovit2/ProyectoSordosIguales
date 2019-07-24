<?php

namespace App\Http\Controllers;

use App\tabla_usuario_nota;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;


class NotasController extends Controller
{
    public function indiceNotas(User $user){
        $usuarios = DB::select('select name, rut, nota, tabla_usuario_notas.id, tabla_cursos.nombre  from users, tabla_usuario_notas, tabla_cursos where users.id = tabla_usuario_notas.usuarioid and tabla_cursos.id = tabla_usuario_notas.cursoid order by tabla_cursos.nombre asc');
        return view('Plataforma/NotasIndex',compact('usuarios', 'user'));
    }

    public function ingresar(Request $request){

        $rut_alumno = request()->IDalumno;
        $usuario_id = DB::table('users')->where('rut', $rut_alumno)->value('id');

        $curso_id = DB::table('tabla_usuario_cursos')->where('usuarioid', $usuario_id)->where('estado', '=' , 'Cursando')->value('cursoid');
        $curso_nombre = DB::table('tabla_cursos')->where('id', $curso_id)->value('nombre');

        $tipo_evaluacion = request()->tipoevaluacion;
        $evaluacion = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $tipo_evaluacion)->value('id');

        $nota = request()->nota;

        $existeAlumnoEnCurso = DB::select('select estado from tabla_usuario_cursos where cursoid = :curso_id and usuarioid = :usuario_id',['curso_id' => $curso_id, 'usuario_id' => $usuario_id]);
        if (empty($existeAlumnoEnCurso)) {
            return back()->with('error5','ERROR 424: El Alumno no está inscrito en el Curso');
        }
        if(!$rut_alumno){
            return back()->with('error1','ERROR 424: El Estudiante no existe');
        }else{
            if(!$curso_id){
                return back()->with('error2','ERROR 424: El Estudiante no se encuentra cursando ningun curso actualmente');
            }else{
                $nota = str_replace(",",".",$nota);
                if(is_numeric($nota)){
                    if($nota >= 10) {
                        $nota = $nota / 10;
                    }
                    if($nota >= 1 && $nota <= 7) {
                        $nota = $nota*10;
                        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                        if(!$evaluacion){
                            DB::table('tabla_evaluaciones_cursos')->insert(
                                ['nombreEvaluacion' => $tipo_evaluacion, 'cursoid' => $curso_id]
                            );
                            $evaluacion = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $tipo_evaluacion)->value('id');
                        }
                        DB::table('tabla_usuario_notas')->insert(
                            ['nota' => $nota, 'usuarioid' => $usuario_id, 'cursoid' => $curso_id, 'notaid' => $evaluacion]
                        );
                        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
                        return back()->with('exito','Nota ingresada correctamente en: '.$curso_nombre);
                    }else{
                        return back()->with('error4','ERROR: Formato de Nota incorrecto');
                    }
                }
                return back()->with('error4','ERROR: Formato de Nota incorrecto');
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
            if($request->notaAlumno >= 10){
                $request->notaAlumno = $request->notaAlumno/10;
            }
            if($request->notaAlumno >= 1 && $request->notaAlumno <= 7){
                $request->notaAlumno = $request->notaAlumno*10;
                DB::table('tabla_usuario_notas')
                    ->where('id', $idNota)
                    ->update(['nota' => $request->notaAlumno]);
                return redirect('ModificarNotas');
            }else{
                return back()->with('error','Formato de Nota Incorrecto');
            }
        }
        return back()->with('error','Formato de Nota Incorrecto');
    }


    public function eliminar($idNota){
        DB::table('tabla_usuario_notas')->where('id', '=', $idNota)->delete();
        return back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
