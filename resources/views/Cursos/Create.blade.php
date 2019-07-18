@extends('layout')

@section('title', "Crear curso")

@section('content')
    <br>
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
    <div class ="card">
        <h4>Nuevo Curso</h4>

    @include('shared._errors')

    <form method="POST" action="{{url('cursos') }}">

        @include('Cursos._fields')

        <div class="form-group mt-4">
            <button class="btn btn-primary" type="submit">Crear curso</button>
            <a href=" {{route('cursos.index')}} " class="btn btn-primary"> Regresar </a>
        </div>
    </form>

    </div>
    <?php } ?>
@endsection