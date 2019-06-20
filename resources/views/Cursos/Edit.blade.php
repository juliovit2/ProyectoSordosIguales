@extends('layout')

@section('title', "Actualizar curso")

@section('content')

    @card
    @slot('header', 'Editar Curso')

    @include('shared._errors')

    <form method="POST" action="{{url("cursos/{$curso->id}")}}">
        {{method_field('PUT')}}

        @include('Cursos._fields')

        <div class="form-group mt-4">
            <button class="btn btn-primary" type="submit">Actualizar curso</button>
            <a href=" {{route('cursos.index')}} " class="btn btn-link"> Regresar </a>
        </div>
    </form>

    @endcard

@endsection