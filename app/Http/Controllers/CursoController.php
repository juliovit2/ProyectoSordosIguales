<?php

namespace App\Http\Controllers;
use App\tabla_curso;
use App\Http\Forms\CursoForm;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCursoRequest;
use App\User;
use Auth;
use DB;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = tabla_curso::all();
        $title = 'Listado de Cursos';
        return view('cursos.index', compact('title', 'cursos'));
    }

    public function add(tabla_curso $curso)
    {
        return view('Cursos.Add', compact('curso'));
    }

    public function show(tabla_curso $curso)
    {
        return view('Cursos.Show', compact('curso'));
    }

    public function store(CreateCursoRequest $request )
    {
        $request->createCurso();

        return redirect()->route('cursos.index');
    }

    public function create()
    {
        return (new CursoForm('Cursos.Create', new tabla_curso));
    }

    public function edit(tabla_curso $curso)
    {
        return new CursoForm('Cursos.Edit', $curso);
    }

    public function update(tabla_curso $curso)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $curso->update($data);

        return redirect()->route('cursos.show', ['curso' => $curso]);
    }


    function destroy(tabla_curso $curso){

        $curso->delete();

        return redirect()->route('cursos.index');
    }


    function agregarAlumnoIndex($idCurso){

        $id = request()->idCurso;
        $nombreCurso = DB::table('tabla_cursos')->where('id', $id)->value('nombre');
        $users = User::all();

        return view('Cursos/IngresarAlumno',compact('nombreCurso', 'users'));
    }

    function agregarAlumno(Request $request){

        $rut = request()->alumnoRUT;
        $idAlumno = DB::table('users')->where('rut', $rut)->value('id');
        if($idAlumno == null){
            return back()->with('error','ERROR: Alumno no existe');
        }
        $estado = request()->estado;
        $nombreCurso = request()->nombreCurso;
        $idCurso = DB::table('tabla_cursos')->where('nombre', $nombreCurso)->value('id');
        if($idCurso == null){
            return back()->with('error2','ERROR: Curso no creado');
        }
        $existeAlumno = DB::select('select usuarioid, cursoid from tabla_usuario_cursos where estado = :estado and usuarioid = :idAlumno and cursoid = :idCurso',
            ['estado' => $estado, 'idAlumno' => $idAlumno, 'idCurso' => $idCurso]);
        $cursando = 'Cursando';
        if (empty($existeAlumno)) {
            $actualizarEstado = DB::select('select estado from tabla_usuario_cursos where usuarioid = :idAlumno and cursoid = :idCurso',
                ['idAlumno' => $idAlumno, 'idCurso' => $idCurso]);
            if(empty($actualizarEstado)){//ingresar nuevo curso
                $notas = DB::table('tabla_usuario_notas')->where('usuarioid', '=', $idAlumno)->where('cursoid', '=', $idCurso)->avg('nota');
                if($notas < 40){
                    $estadofinal = 'Reprobado';
                }else{
                    $estadofinal = 'Aprobado';
                }
                DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                DB::table('tabla_usuario_cursos')->insert(
                    ['asistencia' => 100, 'estado' => $estado, 'usuarioid' => $idAlumno, 'cursoid' => $idCurso]
                );

                DB::table('tabla_usuario_cursos')->where('usuarioid', $idAlumno)->where('cursoid', $idCurso)->where('estado', $cursando)->update(['estado' => $estadofinal]);
                return back()->with('exito2','Alumno actualizado correctamente');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
                return back()->with('exito','Alumno ingresado correctamente');
            }else{
                DB::table('tabla_usuario_cursos')->where('usuarioid', $idAlumno)->where('cursoid', $idCurso)->update(['estado' => $estado]);
                return back()->with('exito2','Alumno actualizado correctamente');
            }
        }else{
            return back()->with('exito3','Alumno actualizado correctamente');
        }
    }

    function visualizarCursoIndex($idCurso){

        $id = request()->idCurso;
        $alumnos = DB::select('select users.name, users.id, tabla_usuario_cursos.estado, tabla_usuario_cursos.asistencia  from users, tabla_usuario_cursos where users.id = tabla_usuario_cursos.usuarioid and tabla_usuario_cursos.cursoid = :id',['id' => $id]);

        return view('Cursos/VisualizarCurso',compact('alumnos'));

    }

    function asistencia(Request $request){

        $rut = $request->RUTalumno;
        $curso = $request->NOMBREcurso;
        $asistencia = $request->asistencia;

        $idAlumno = DB::table('users')->where('rut', $rut)->value('id');

        if($idAlumno == null){
            return back()->with('error1','ERROR: El Alumno no existe');
        }

        $idCurso = DB::table('tabla_cursos')->where('nombre', $curso)->value('id');

        if($idCurso == null){
            return back()->with('error2','ERROR: El Curso no existe');
        }

        $existeAlumnoEnCurso = DB::select('select asistencia from tabla_usuario_cursos where usuarioid = :idAlumno and cursoid = :idCurso',['idAlumno' => $idAlumno, 'idCurso' => $idCurso]);

        if (empty($existeAlumnoEnCurso)) {
            return back()->with('error3','ERROR: El Alumno no está ingresado en el Curso');
        }

        if(!is_numeric($asistencia)){
            return back()->with('error4','ERROR: Formato de Asistencia incorrecto');
        }

        if($asistencia < 0 || $asistencia > 100){
            return back()->with('error5','ERROR: La Asistencia debe estar entre 0 y 100');
        }

        DB::table('tabla_usuario_cursos')
            ->where('usuarioid', $idAlumno)
            ->where('cursoid', $idCurso)
            ->update(['asistencia' => $asistencia]);

        return back()->with('exito','Asistencia actualizada correctamente');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
