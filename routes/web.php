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
Route::get('/crear-noticia', 'NoticiaController@create')->name('Crear Noticia xd');
Route::post('/crear-noticia', 'NoticiaController@store');
// ----------- MODULO CURSOS -----------


// ----------- MODULO CONTACTO -----------


// ----------- MODULO (EL OTRO)-----------


