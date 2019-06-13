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
Route::post('subidaDeArchivo','InformacionController@subirArchivo');


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

// -----------LOGIN-----------
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//PORTAL
Route::get('/PortalAlumnos', function () {
    return view('Plataforma/PortalAlumnos');
});
Route::get('/cursos', 'CursoController@index')->name('cursos.index');
Route::get('/cursos/{curso}', 'CursoController@show')->where('curso', '[0-9]+')->name('cursos.show');
Route::get('/cursos/nuevo', 'CursoController@create')->name('cursos.create');
Route::get('/cursos/{curso}/editar', 'CursoController@edit')->name('cursos.edit');
Route::delete('/cursos/{curso}', 'CursoController@destroy')->name('cursos.destroy');
//INGRESAR NOTAS
Route::post('ingresarNotas', 'NotasController@ingresar')->name('ingresarNotas');
Route::get('/IngresarNotas', function () {
    return view('Plataforma/IngresarNotas');
});
//MODIFICAR NOTAS
Route::post('modificiarNotas', 'NotasController@modificiar')->name('modificarNotas');
Route::get('/ModificarNotas', function () {
    return view('Plataforma/ModificarNotas');
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
