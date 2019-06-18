@extends('layout')
@section('title', "Curso {$curso->id}")
@section('content')
    <div class="card">
        <h4 class="card-header">
            <div class="form-row">
                Detalles del Curso #{{ $curso->id }}
                <form action="{{ route('cursos.destroy', $curso) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </div>
        </h4>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del Curso</th>
                    <th scope="col">Profesor Encargado</th>
                </tr>
                </thead>
                @php
                    //$idcurso = DB::table('tabla_usuario_cursos')->select('cursoid')->where('usuarioid', '=', $user->id)->first()->cursoid;
                    //$nomCurso = DB::table('tabla_cursos')->select('nombre')->where('id','=',$idcurso)->first()->nombre;
                    //$asistencia = DB::table('tabla_usuario_cursos')->select('asistencia')->where('usuarioid', '=', $user->id)->first()->asistencia;
                @endphp
                <tbody>
                <tr>
                    <th>{{ $curso->id }}</th>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->profesorid }}</td>
                </tr>
                </tbody>
            </table>
            <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>
        </div>
    </div>
@endsection