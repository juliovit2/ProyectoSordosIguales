@extends('layout')

@section('title', "Crear curso")

@section('content')

    @card
    @slot('header', 'Nuevo Curso')

    @include('shared._errors')

    <form method="POST" action="{{url('cursos') }}">

        @include('Cursos._fields')

        <div class="form-group mt-4">
            <button class="btn btn-primary" type="submit">Crear curso</button>
            <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>
        </div>
    </form>

    @endcard
@endsection