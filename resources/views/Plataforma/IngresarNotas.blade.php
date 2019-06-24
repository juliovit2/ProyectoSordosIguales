@extends('layout')
@section('title', "Notas")
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>

    <br>
    <form method="POST" action="{{ route('ingresarNotas') }}">
        {{ csrf_field() }}

        <table>
            <tr>
                <td><p>Ingresar RUT de Alumno: <input type="search" name="IDalumno"></p></td>
            </tr>
            <tr>
                <td><p>Ingresar Nombre del Curso:
                        <select id="IDcurso" name="IDcurso">
                            <option value="Lenguaje Señas Basico">Lenguaje Señas Basico</option>
                            <option value="Lenguaje Señas Intermedio">Lenguaje Señas Intermedio</option>
                            <option value="Lenguaje Señas Avansado">Lenguaje Señas Avanzado</option>
                        </select>
                    </p></td>
            </tr>
            <tr>
                <td><p>Ingresar Tipo de Evaluación:
                        <select id="tipoevaluacion" name="tipoevaluacion">
                            <option value="Taller">Taller</option>
                            <option value="Taller Abierto">Taller Abierto</option>
                        </select>
                    </p></td>
            </tr>
            <tr>
                <td> <p>Ingresar Nota: <input type="search" name="nota"></p></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-primary">
            {{ __('Ingresar Nota') }}
        </button>
    </form>

    @if ($message = Session::get('error1'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error2'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error3'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error4'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('exito'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="success">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


<?php } ?>
@endsection
