<?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
        <head>
            <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
        </head>
        <?php }
        else{?>
        <head>
            <meta http-equiv='refresh' content='0; URL=/PortalAlumnos'>
        </head>
        <?php } ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body>
Login correcto, bienvenido.
</body>