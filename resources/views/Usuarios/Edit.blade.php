@extends('layout')

@section('title', "Actualizar usuario")

@section('content')
    <?php
    $tipo=2;
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno' && $id != $user->id){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>
    <br>
    <div class ="card">
        <h4>Editar Usuario</h4>

        @include('shared._errors')

        <form method="POST" action="{{url("usuarios/{$user->id}")}}">
            {{method_field('PUT')}}

            @include('Usuarios._fields')

            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Actualizar usuario</button>
                <a href=" {{route('users.index')}} " class="btn btn-primary"> Regresar </a>
            </div>
        </form>
    </div>
    <?php }?>
@endsection