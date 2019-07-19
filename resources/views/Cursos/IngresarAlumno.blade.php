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


    <form method="POST" action="{{url("ingresarAlumnoCurso")}}">
        {{ csrf_field() }}
        @if ($message = Session::get('exito'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('exito2'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('exito3'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
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
        <div class="form-col">
            <div class="card">
                <h4>Ingresar/Actualizar Alumno en un Curso</h4>
            @foreach((array) $nombreCurso as $nombreCurso)

                <div class="col-md-4 mb-3">
                    <p align="left">RUT del Alumno</p>
                    <input type="search"
                           name="alumnoRUT"
                           class="form-control"
                           id="rut"
                           placeholder="Ingrese RUT del alumno"
                            >
                </div>

                <div class="col-md-4 mb-3">
                    <p align="left">Estado del Alumno</p>
                    <select
                        id="estado"
                        name="estado"
                        class="form-control"
                        required>

                        <option value="Cursando">Cursando</option>
                        <option value="Aprobado">Aprobado</option>
                        <option value="Reprobado">Reprobado</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <p align="left">Nombre del Curso</p>
                    <input type="text"
                           name="nombreCurso"
                           class="form-control"
                           id="nombreCurso"
                           placeholder="Nombre del Curso"
                           value="{{ old('name', $nombreCurso) }}" readonly required>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ingresar/Actualizar Alumno') }}
                    </button>
                    <a href=" {{route('cursos.index')}} " class="btn btn-primary"> Regresar </a>
                </div>
        @endforeach
            </div>

    </div>
    </form>

    <?php } ?>
@endsection


