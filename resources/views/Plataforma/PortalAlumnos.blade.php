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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>Plataforma FSI</title>

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
                color: #fff;
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

            #users{
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: violet;
                border-color: violet;
                font-size: 25px;
                text-align: center;
            }
            #notas{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: green;
                border-color: green;
                font-size: 25px;
                text-align: center;
            }
            #cursos{
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: firebrick;
                border-color: firebrick;
                font-size: 25px;
                text-align: center;
            }
            #documentos{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: darkblue;
                border-color: darkblue;
                font-size: 25px;
                text-align: center;
            }
            #noticias{
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: coral;
                border-color: coral;
                font-size: 25px;
                text-align: center;
            }
            #voluntarios{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: rebeccapurple;
                border-color: rebeccapurple;
                font-size: 25px;
                text-align: center;
            }
            #faq{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: orange;
                border-color: orange;
                font-size: 25px;
                text-align: center;
            }
            #profesores{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: dodgerblue;
                border-color: dodgerblue;
                font-size: 25px;
                text-align: center;
            }
            #mapa{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: dodgerblue;
                border-color: dodgerblue;
                font-size: 25px;
                text-align: center;
            }
            #colaboradores{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: dodgerblue;
                border-color: dodgerblue;
                font-size: 20px;
                text-align: center;
            }
            #donaciones{
                margin: 8px;
                position: relative;
                width: 20%;
                height: 100px;
                font-weight: bold;
                background-color: dodgerblue;
                border-color: dodgerblue;
                font-size: 25px;
                text-align: center;
            }
            .titulo{
                margin: 20px;
                font-size: 60px;
            }
        </style>
    </head>
    <body>
    <h1>Plataforma FSI</h1>
        <center>
            <div class="head">
                <h4 class ="titulo">Plataforma FSI</h4>
                <div class="content">
                    <div class="col">
                        <a href="{{route('users.index')}}"><button id="users" class="btn btn-primary" type="submit">Estudiantes<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/ModificarNotas')}}"><button id="notas" class="btn btn-primary" type="submit">Notas<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/cursos')}}"><button id="cursos" class="btn btn-primary" type="submit">Cursos<br><i class="fas fa-wrench"></i></button></a>
                        <br>
                        <a href="{{url('/admin/documentos')}}"><button id="documentos" class="btn btn-primary" type="submit">Documentos<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/admin/noticias')}}"><button id="noticias" class="btn btn-primary" type="submit">Noticias<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/admin/voluntarios')}}"><button id="voluntarios" class="btn btn-primary" type="submit">Voluntarios<br><i class="fas fa-wrench"></i></button></a>
                        <br>
                        <a href="{{url('/faq')}}"><button id="faq" class="btn btn-primary" type="submit">FAQ<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/profesores')}}"><button id="profesores" class="btn btn-primary" type="submit">Profesores<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/redesEdit')}}"><button id="mapa" class="btn btn-primary" type="submit">Mapa Fundaciones<br><i class="fas fa-wrench"></i></button></a>
                        <br>
                        <a href="{{url('/admin/colaboradores')}}"><button id="colaboradores" class="btn btn-primary" type="submit">Colaboradores y alianzas<br><i class="fas fa-wrench"></i></button></a>
                        <a href="{{url('/admin/donaciones')}}"><button id="donaciones" class="btn btn-primary" type="submit">Donaciones<br><i class="fas fa-wrench"></i></button></a>
                    </div>
                </div>
            </div>
        </center>
    </body>
    </html>
    <?php } ?>
    @else
        <head>
            <meta http-equiv='refresh' content='0; URL=/login'>
        </head>
@endauth
