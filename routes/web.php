<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//escribir todas las rutas requeridas aqui siguiendo el mismo formato


// ----------- MODULO NOTICIAS -----------


// ----------- MODULO CURSOS -----------

Route::get('/Plataforma', function () {
    return view('Plataforma/IniciarSesion');
});


// ----------- MODULO CONTACTO -----------


// ----------- MODULO (EL OTRO)-----------


