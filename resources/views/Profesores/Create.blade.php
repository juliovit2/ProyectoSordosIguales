@extends('layout')

@section('title', "Crear Profesor")

@section('content')
    <?php
    $tipo=1;
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
        <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>

    <br>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class ="card">
        <h4>Nuevo Profesor</h4>

            @include('shared._errors')

            <form method="POST" action="{{url('profesores') }}">

                @include('Profesores._fields')

                <div class="form-group mt-4">
                    <button class="btn btn-primary" type="submit">Crear Profesor</button>
                    <a href=" {{route('profesores.index')}} " class="btn btn-primary"> Regresar </a>
                </div>
            </form>
    </div>
    <?php } ?>
@endsection