@extends('layout')
@section('title', "notas")
@section('content')
    <br>
    <form method="POST" action="{{ route('ingresarNotas') }}">
        {{ csrf_field() }}
    <p>Ingresar RUT de Alumno: <input type="search" name="IDalumno"></p>
    <p>Ingresar ID del Curso: <input type="search" name="IDcurso"></p>
    <p>Ingresar Tipo de Evaluación: <input type="search" name="tipoevaluacion"></p>
    <p>Ingresar Nota: <input type="search" name="nota"></p>
    <button type="submit" class="btn btn-primary">
        {{ __('Ingresar Nota') }}
    </button>
</form>
@endsection
