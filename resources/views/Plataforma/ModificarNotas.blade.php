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
    <html>
    <head>
        <title>View Student Records</title>
    </head>

    <body>

    <table border = "1">
        <tr>
            <td>RUT</td>
            <td>Nombre</td>
            <td>Curso</td>
            <td>Nota</td>
        </tr>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->rut }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->nota }}</td>
                <td><a href = 'edit/{{ $usuario->id }}'>Modificar</a></td>
                <td><a href = 'delete/{{ $usuario->id }}'>Eliminar</a></td>
            </tr>
        @endforeach


    </table>
    </body>
    </html>
@endsection