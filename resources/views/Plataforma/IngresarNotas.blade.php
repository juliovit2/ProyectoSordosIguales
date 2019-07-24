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

        @if ($message = Session::get('exito'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="success">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
    <div class="form-col">
        <br>
        <div class ="card">
                <h4>Ingresar Notas</h4>

            <div class="col-md-4 mb-3">
                <p align="left">RUT</p>
                <input type="search"
                       name="IDalumno"
                       class="form-control"
                       id="rut"
                       placeholder="Ingrese RUT del alumno"
                       required>
            </div>

            {{-- Ingresar Nombre del curso

            <div class="col-md-4 mb-3">
                <p align="left">Nombre del Curso</p>
                <input type="search"
                       name="IDcurso"
                       class="form-control"
                       id="IDcurso"
                       placeholder="Ingrese el Nombre del Curso"
                       required>
            </div>
            --}}

            {{--
            @php
                $cursos = \App\tabla_curso::all();
            @endphp
            <div class="col-md-4 mb-3">
                <p align="left">Nombre del Curso</p>
                <select name="IDcurso" id="IDcurso" class="form-control">
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->nombre }}">

                            {{ $curso->nombre }}
                        </option>
                    @endforeach
                </select>
            </div> --}}


            {{--<option value="{{ $curso->id }}"{{ old('cursoid', $nota->cursoid) == $curso->id ? 'selected' : '' }}>--}}

            {{-- ************************************************************** --}}

            <div class="col-md-4 mb-3">
                <p align="left">Tipo de Evaluación</p>
                <input type="search"
                       name="tipoevaluacion"
                       class="form-control"
                       id="tipoevaluacion"
                       placeholder="Ingrese el Tipo de Evaluación"
                       required>
            </div>

            <div class="col-md-4 mb-3">
                <p align="left">Nota</p>
                <input type="search"
                       name="nota"
                       class="form-control"
                       id="nota"
                       placeholder="Ingrese la Nota del alumno"
                       required>
            </div>



            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ingresar Nota') }}
                </button>
                <a href=" {{route('ModificarNotas')}} " class="btn btn-primary"> Regresar </a>
            </div>


            </div>
        </div>
    </form>


<?php } ?>
@endsection
