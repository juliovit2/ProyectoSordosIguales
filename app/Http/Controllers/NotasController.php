<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;


class NotasController extends Controller
{

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
            return 'El alumno ingresado no existe';
        }else{
            if($nombre_curso != $curso){
                return 'El curso no existe';
            }else{
                if($tipo_evaluacion != $evaluacion ) {
                    return 'Tipo de evaluación no correcponde';
                }else{
                    if(is_numeric($nota)) {

                        $alumnoID = DB::table('users')->where('rut', $rut)->value('id');
                        $cursoID = DB::table('tabla_cursos')->where('nombre', $nombre_curso)->value('id');
                        $notaID = DB::table('tabla_evaluaciones_cursos')->where('nombreEvaluacion', $evaluacion)->value('id');
                        //dd($nota, $alumnoID, $cursoID, $notaID);

                        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                        DB::table('tabla_usuario_notas')->insert(
                            ['nota' => $nota, 'usuarioid' => $alumnoID, 'cursoid' => $cursoID, 'notaid' => $notaID]
                        );
                        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

                        return 'LISTO';

                    }else{
                        return 'Formato de Nota es incorrecto';
                    }
                }
            }
        }
    }

}
