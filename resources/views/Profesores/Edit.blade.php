@extends('layout')

@section('title', "Actualizar usuario")

@section('content')
    <?php
    $tipo=2;
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>

    <?php }else{ ?>
    <br>
    <div class ="card">
        <h4>Editar Profesor</h4>

        @include('shared._errors')

        <form method="POST" action="{{url("profesores/{$profesor->id}")}}">
            {{method_field('PUT')}}

            @include('Profesores._fields')

            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Actualizar Profesor</button>
                <a href=" {{route('profesores.index')}} " class="btn btn-primary"> Regresar </a>
            </div>
        </form>
    </div>
    <?php }?>
@endsection