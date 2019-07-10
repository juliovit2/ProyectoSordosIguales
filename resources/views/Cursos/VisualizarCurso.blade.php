@extends('layout')
@section('title', "Curso")
@section('content')
    <br>
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">Alumnos Inscritos</h1>
    </div>
    <body>
    <div class="card">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre Alumno</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>

            @foreach($alumnos as $alumnos)
                <tr>
                    <th scope="row">{{ $alumnos->name }}</th>
                    <td scope="row">{{ $alumnos->estado }}</td>
                    <td>
                        <a href="{{ route('IndiceNotas', $alumnos->id) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </body>
    <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>

    <?php } ?>
@endsection
