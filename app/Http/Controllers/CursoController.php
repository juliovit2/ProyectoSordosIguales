<?php

namespace App\Http\Controllers;
use App\tabla_curso;
use App\Http\Forms\CursoForm;
use Illuminate\Validation\Rule;
use App\Http\Requests\CreateCursoRequest;
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

    public function store(CreateCursoRequest $request )
    {
        $request->createCurso();

        return redirect()->route('cursos.index');
    }

    public function create()
    {
        return new CursoForm('Cursos.Create', new tabla_curso);
    }

    public function edit(tabla_curso $curso)
    {
        return new CursoForm('Cursos.Edit', $curso);
    }

    public function update(tabla_curso $curso)
    {
        $data = request()->validate([
            'name' => 'required',
            'profesorid' => 'required'
        ]);

        //$user->update($data);
        return redirect()->route('cursos.show', ['curso' => $curso]);
    }

    function destroy(tabla_curso $curso){

        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
