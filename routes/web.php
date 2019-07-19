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




//escribir todas las rutas requeridas aqui siguiendo el mismo formato


// ----------- MODULO NOTICIAS -----------

//crea las 7 rutas necesarias
Route::resource('admin/noticias', 'NoticiaController');
Route::get('admin/noticias/edit/{id}', 'NoticiaController@edit');
Route::get('admin/noticias/delete/{id}', "NoticiaController@destroy");
Route::get('/noticias/delete/{id}', "NoticiaController@destroy");

Route::post('admin/noticias/create', 'NoticiaController@store');
Route::post('admin/noticias/edit/{id}', 'NoticiaController@update');
Route::post('admin/noticias/previsualizar', 'NoticiaController@show_preview');
Route::get('/noticias', 'NoticiaPublicController@public_index');
Route::get('/noticias/{id}', 'NoticiaPublicController@show');

//PORTAL
Route::get('/PortalAlumnos', function () {
    return view('Plataforma/PortalAlumnos');
});
Route::get('/loginCorrecto', function(){
    return view('Plataforma.LoginExitoso');
});

// ----------- MODULO CURSOS -----------
Route::get('/cursos', 'CursoController@index')->name('cursos.index');

Route::get('/cursos/{curso}', 'CursoController@show')->where('curso', '[0-9]+')->name('cursos.show');
Route::get('agregarAlumno/{idCurso}','CursoController@agregarAlumnoIndex');
Route::post('ingresarAlumnoCurso', 'CursoController@agregarAlumno')->name('ingresarAlumno');
Route::get('visualizarCursos/{idCurso}','CursoController@visualizarCursoIndex')
    ->where('idCurso', '[0-9]+')
    ->name('visualizarCursos');

Route::post('asistencia', 'CursoController@asistencia')->name('asistencia');
Route::get('/Asistencia', function () {
    return view('Cursos/Asistencia');
});

Route::get('/cursos/nuevo', 'CursoController@create')->name('cursos.create');
Route::get('/cursos/{curso}/editar', 'CursoController@edit')->name('cursos.edit');
Route::delete('/cursos/{curso}', 'CursoController@destroy')->name('cursos.destroy');
Route::post('/cursos', 'CursoController@store');
Route::put('/cursos/{curso}', 'CursoController@update');






//-----------MODULO Notas-------------------------------Mejorado
//Route::get('/cursos', 'NotasController@index')->name('notas.index');


// -----------LOGIN-----------
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//INGRESAR NOTAS
Route::post('ingresarNotas', 'NotasController@ingresar')->name('ingresarNotas');
Route::get('/IngresarNotas', function () {
    return view('Plataforma/IngresarNotas');
});
Route::get('ModificarNotas', 'NotasController@modificar')->name('ModificarNotas');
Route::get('edit/{id}','NotasController@modificarConector');
Route::post('mod/{id}','NotasController@modificarIndex');
Route::get('IndiceNotas/{user}', 'NotasController@indiceNotas')
    ->where('user', '[0-9]+')
    ->name('IndiceNotas');
Route::get('IndiceNotas/edit/{user}','NotasController@modificarConector');
Route::post('IndiceNotas/mod/{user}','NotasController@modificarIndex');
Route::get('IndiceNotas/delete/{user}','NotasController@eliminar');
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

Route::resource ('/redes','TablaMapaController');
Route::get('/redesEdit','tablaMapaController@indexEd');
Route::patch ('/redesEdit','tablaMapaController@update');

// ----------- MODULO (Documentos)-----------
Route::resource('admin/documentos', 'DocumentoController');
Route::get('documentos', 'DocumentoPublicController@interface')->name('documentos.interface');

// ----------- MODULO (Convenios y Alianzas)-----------
Route::resource('admin/colaboradores', 'ColaboradorController');
// ----------- MODULO (Donaciones)-----------
Route::resource('admin/donaciones', 'DonacionesController');
Route::get('donaciones', 'DonacionesPublicController@interface')->name('Donaciones.interface');

Route::resource('admin/donaciones/index', 'DonacionesController');

// ----------- MODULO (Carrusel inicio)-----------
Route::resource('/admin/carrusel','HomeController');
Route::get('/', 'HomePublicController@interface');


Auth::routes();


//RUTAS DE USUARIO

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::post('/usuarios', 'UserController@store');
Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
Route::put('/usuarios/{user}', 'UserController@update');


Route::delete('/usuarios/{user}', 'UserController@destroy')
    ->name('users.destroy');


//RUTAS de Profesor
/*
Route::get('/profesores', 'ProfesorController@index')
    ->name('profesores.index');
Route::get('/profesores/{profesor}', 'ProfesorController@show')
    ->where('profesor', '[0-9]+')
    ->name('profesores.show');
Route::get('/profesores/nuevo', 'ProfesorController@create')->name('profesores.create');
Route::post('/profesores', 'ProfesorController@store');
Route::get('/profesores/{profesor}/editar', 'ProfesorController@edit')->name('profesores.edit');
Route::put('/profesores/{profesor}', 'ProfesorController@update');
Route::delete('/profesores/{profesor}', 'ProfesorController@destroy')
    ->name('profesores.destroy');
*/

Route::resource('/profesores', 'ProfesorController');
Route::get('/profesores/edit/{id}', 'ProfesorController@edit');
Route::get('/profesores/delete/{id}', "ProfesorController@destroy");
Route::post('/profesores/create', 'ProfesorController@store');
Route::post('/profesores/edit/{id}', 'ProfesorController@update');
Route::get('/profesores/{profesor}', 'ProfesorController@show')
    ->where('profesor', '[0-9]+')
    ->name('profesores.show');