@extends('layout')
@section('title', "notas")
@section('content')

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <br>
    <form method="POST" action="{{ route('ingresarNotas') }}">
        {{ csrf_field() }}
    <p>Ingresar RUT de Alumno: <input type="search" name="IDalumno"></p>

    <p>Ingresar Nombre del Curso:
        <select id="IDcurso" name="IDcurso">
            <option value="Lenguaje Señas Basico">Lenguaje Señas Basico</option>
            <option value="Lenguaje Señas Intermedio">Lenguaje Señas Intermedio</option>
            <option value="Lenguaje Señas Avansado">Lenguaje Señas Avanzado</option>
        </select>
    </p>


    <p>Ingresar Tipo de Evaluación:
        <select id="tipoevaluacion" name="tipoevaluacion">
            <option value="Taller">Taller</option>
            <option value="Taller Abierto">Taller Abierto</option>
        </select>
    </p>

    <p>Ingresar Nota: <input type="search" name="nota"></p>

    <button type="submit" class="btn btn-primary">
        {{ __('Ingresar Nota') }}
    </button>
</form>
@endsection
