<!doctype html>
@auth
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
        <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }
    else { ?>
    @extends('layout')
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plataforma Sordos Iguales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
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
    </head>
    <body>
    <h1>Laravel</h1>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Proyecto Sordos Iguales
            </div>
            <div>
                <a href="{{route('users.index')}}"><button class="btn btn-primary" type="submit">Estudiantes</button></a>
                <a href="{{url('/ModificarNotas')}}"><button class="btn btn-primary" type="submit">Notas</button></a>
                <a href="{{url('/cursos')}}"><button class="btn btn-primary" type="submit">Cursos</button></a>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php } ?>
    @else
        <head>
            <meta http-equiv='refresh' content='0; URL=/login'>
        </head>
@endauth
