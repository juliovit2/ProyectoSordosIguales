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

    <br>
    <div class ="card">
        <h4>Modificar Nota</h4>
        <form action = "/mod/{{ $idNota }}" method = "post">
            {{ csrf_field() }}
            <div class="col-md-4 mb-3">
                <p align="left">Ingresar Nota de Alumno: <input type="search" name="notaAlumno" class="form-control"></p>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Cambiar Nota') }}
                </button>
                <a href=" {{ URL::previous() }} " class="btn btn-primary"> Regresar </a>
            </div>
        </form>
    </div>

    @if ($message = Session::get('error'))

        <div class="alert alert-danger alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
<?php } ?>
@endsection
