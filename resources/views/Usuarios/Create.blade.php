@extends('layout')

@section('title', "Crear usuario")

@section('content')

    <center>
        @card
            @slot('header', 'Nuevo Usuario')

            @include('shared._errors')

            <form method="POST" action="{{url('usuarios') }}">

                @include('Usuarios._fields')

                <div class="form-group mt-4">
                    <button class="btn btn-primary" type="submit">Crear usuario</button>
                    <a href=" {{route('users.index')}} " class="btn btn-link"> Regresar </a>
                </div>
            </form>

        @endcard
    </center>
@endsection