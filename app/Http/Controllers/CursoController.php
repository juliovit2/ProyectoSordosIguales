<?php

namespace App\Http\Controllers;
use App\tabla_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class CursoController extends Controller
{
    public function index()
    {
        $cursos = tabla_curso::all();
        $title = 'Listado de Cursos';
        return view('cursos.index', compact('title', 'cursos'));
    }

    public function show(tabla_curso $curso)
    {
        return view('Cursos.Show', compact('curso'));
    }

    public function create()
    {
        $curso = new tabla_curso;

        return view('Cursos.Create', compact('curso'));
    }

    public function edit(tabla_curso $curso)
    {
        return view('Cursos.edit', compact('curso'));
    }

    function destroy(tabla_curso $curso){

        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
