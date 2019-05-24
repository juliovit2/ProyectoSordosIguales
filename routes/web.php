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

//crea las 7 rutas necesarias
Route::resource('noticia', 'NoticiaController');
Route::get('noticia/edit/{id}', 'NoticiaController@edit');
Route::get('noticia/delete/{id}', "NoticiaController@destroy");

Route::post('/noticia/create', 'NoticiaController@store');
Route::post('/noticia/edit/{id}', 'NoticiaController@update');
Route::post('noticia/previsualizar', 'NoticiaController@show_preview');

// ----------- MODULO CURSOS -----------


// ----------- MODULO CONTACTO -----------


// ----------- MODULO (EL OTRO)-----------


