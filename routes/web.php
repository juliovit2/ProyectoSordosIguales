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
Route::resource('admin/noticias', 'NoticiaController');
Route::get('admin/noticias/edit/{id}', 'NoticiaController@edit');
Route::get('admin/noticias/delete/{id}', "NoticiaController@destroy");

Route::post('admin/noticias/create', 'NoticiaController@store');
Route::post('admin/noticias/edit/{id}', 'NoticiaController@update');
Route::post('admin/noticias/previsualizar', 'NoticiaController@show_preview');

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

Route::resource('/contacto','InformacionController');
Route::get('/informacion','InformacionController@info');
Route::post('/contacto','InformacionController@enviarCorreo');
Route::post('subidaDeArchivo','InformacionController@subirArchivo');

Route::resource('/faq','FaqController');
Route::post('faq/create', 'FaqController@store');
Route::get('faq/delete/{id}','FaqController@destroy');

Route::resource('admin/voluntarios', 'VoluntariosController');
Route::get('admin/voluntarios/edit/{id}', 'VoluntariosController@edit');
Route::get('admin/voluntarios/delete/{id}', "VoluntariosController@destroy");
Route::post('admin/voluntarios/create', 'VoluntariosController@store');
Route::post('admin/voluntarios/edit/{id}', 'VoluntariosController@update');


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
