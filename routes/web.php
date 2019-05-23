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

Route::resource('/contacto','InformacionController');
Route::get('/informacion','InformacionController@info');
Route::post('/contacto','InformacionController@enviarCorreo');


//escribir todas las rutas requeridas aqui siguiendo el mismo formato


// ----------- MODULO NOTICIAS -----------


// ----------- MODULO CURSOS -----------

Route::get('/Plataforma', function () {
    return view('Plataforma/IniciarSesion');
});

Route::get('/IngresarNotas', function () {
    return view('Plataforma/IngresarNotas');
});

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('ingresarNotas', 'NotasController@ingresar')->name('ingresarNotas');


Route::get('/PortalAlumnos', function () {
    return view('Plataforma/PortalAlumnos');
});

// ----------- MODULO CONTACTO -----------


// ----------- MODULO (MEMORIAS)-----------
Route::resource('admin/memorias', 'MemoriaController');

Route::get('memorias', 'MemoriaController@interface')->name('memorias.interface');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//RUTAS DE USUARIO

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

Route::get('/usuarios/{user}/editar', 'UserController@edit')
    ->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::post('/usuarios/crear', 'UserController@store');

Route::delete('/usuarios/{user}', 'UserController@destroy')
    ->name('users.destroy');
