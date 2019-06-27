@extends('layout')
@section('title', "notas")
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>

    <br>

    @card
    @slot('header', 'Modificar Nota')

    <form action = "/mod/{{ $idNota }}" method = "post">
        {{ csrf_field() }}

        <p>Ingresar Nota de Alumno: <input type="search" name="notaAlumno"></p>



        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Cambiar Nota') }}
            </button>
            <a href=" {{route('ModificarNotas')}} " class="btn btn-link"> Regresar </a>
        </div>


    @endcard
    </form>

    @if ($message = Session::get('error'))

        <div class="alert alert-danger alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
<?php } ?>
@endsection
