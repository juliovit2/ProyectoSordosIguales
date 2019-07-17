@extends('layout')
@section('title', "Curso {$curso->id}")
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
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
                    $profesor = DB::table('tabla_personas')->where('id', $curso->profesorid)->value('nombre');
                @endphp
                <tbody>
                <tr>
                    <th>{{ $curso->id }}</th>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $profesor }}</td>
                </tr>
                </tbody>
            </table>
            <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>
        </div>
    </div>
    <?php } ?>
@endsection