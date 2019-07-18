@extends('layout')
@section('title', "Cursos")
@section('content')
    <br>
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>

    <br>
    <form method="POST" action="{{ route('asistencia') }}">
        {{ csrf_field() }}

        <div class="form-col">
            <div class="card">
                <h4>Actualizar Asistencia</h4>

            <div class="col-md-4 mb-3">
                <p align="left">RUT del Alumno</p>
                <input type="search"
                       name="RUTalumno"
                       class="form-control"
                       id="RUTalumno"
                       placeholder="Ingrese RUT del alumno"
                       required>
            </div>

            <div class="col-md-4 mb-3">
                <p align="left">Nombre del Curso</p>
                <input type="search"
                       name="NOMBREcurso"
                       class="form-control"
                       id="NOMBREcurso"
                       placeholder="Ingrese el Nombre del Curso"
                       required>
            </div>

            <div class="col-md-4 mb-3">
                <p align="left">% de Asistencia</p>
                <input type="search"
                       name="asistencia"
                       class="form-control"
                       id="asistencia"
                       required>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ingresar Asistencia') }}
                </button>
                <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>
            </div>


            </div>
        </div>
    </form>

    @if ($message = Session::get('exito'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

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

    @if ($message = Session::get('error5'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <?php } ?>
@endsection

