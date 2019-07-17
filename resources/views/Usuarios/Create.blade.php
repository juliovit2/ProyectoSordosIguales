@extends('layout')

@section('title', "Crear usuario")

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
        <h4>Nuevo Usuario</h4>

            @include('shared._errors')

            <form method="POST" action="{{url('usuarios') }}">

                @include('Usuarios._fields')

                <div class="form-group mt-4">
                    <button class="btn btn-primary" type="submit">Crear usuario</button>
                    <a href=" {{route('users.index')}} " class="btn btn-primary"> Regresar </a>
                </div>
            </form>
    </div>
    <?php } ?>
@endsection