@extends('layout')

@section('title', "Actualizar usuario")

@section('content')

    @card
        @slot('header', 'Editar Usuario')

        @include('shared._errors')

        <form method="POST" action="{{url("usuarios/{$user->id}")}}">
            {{method_field('PUT')}}

            @render('UsersFields', compact('user'))

            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Actualizar usuario</button>
                <a href=" {{route('users.index')}} " class="btn btn-link"> Regresar </a>
            </div>
        </form>

    @endcard

@endsection