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
    return view('auth.login');
});

Auth::routes();

/// Inicio - Home Sistema
Route::get('/home', 'HomeController@index')->name('home');
/// Fin - Home Sistema

/// Inicio - Casos Prioritarios
Route::get('/home/caso/listado', 'CasoController@index')->name('listacasos');
Route::get('/home/caso/nuevo', 'CasoController@create')->name('nuevocaso');
Route::post('/home/caso/registrar', 'CasoController@store')->name('registracaso');
Route::get('/home/caso/editar/{id}', 'CasoController@edit')->name('editarcaso');
Route::put('/home/caso/editar/{id}', 'CasoController@update')->name('actualizarcaso');
Route::delete('/home/caso/delete/{id}', 'CasoController@destroy')->name('eliminarcaso');  
/// Fin - Casos Prioritarios

/// Inicio - Fuentes Información Caso Prioritario
Route::get('/home/fuente/listado/{id}', 'FuenteCasoController@index')->name('listafuentes');
Route::get('/home/fuente/download/{id}', 'FuenteCasoController@download')->name('descargafuente');
Route::get('/home/fuente/nuevo/{id}', 'FuenteCasoController@create')->name('nuevafuente');
Route::post('/home/fuente/registrar/{id}', 'FuenteCasoController@store')->name('registrafuente');
Route::get('/home/fuente/editar/{id}', 'FuenteCasoController@edit')->name('editarfuente');
Route::put('/home/fuente/editar/{id}', 'FuenteCasoController@update')->name('actualizarfuente');
Route::delete('/home/fuente/delete/{id}', 'FuenteCasoController@destroy')->name('eliminarfuente'); 
/// Fin - Fuentes Información Caso Prioritario


/// Inicio - Repositorio Documentos
Route::get('/home/documento/listado/{id}', 'DocumentoCasoController@index')->name('listadocumentos');
Route::get('/home/documento/download/{id}', 'DocumentoCasoController@download')->name('descargadocumento');
Route::get('/home/documento/nuevo/{id}', 'DocumentoCasoController@create')->name('nuevodocumento');
Route::post('/home/documento/registrar/{id}', 'DocumentoCasoController@store')->name('registradocumento');
Route::get('/home/documento/editar/{id}', 'DocumentoCasoController@edit')->name('editardocumento');
Route::put('/home/documento/editar/{id}', 'DocumentoCasoController@update')->name('actualizardocumento');
Route::delete('/home/documento/delete/{id}', 'DocumentoCasoController@destroy')->name('eliminardocumento'); 
/// Fin - Repositorio Documentos



//Route::resource('alumno','AlumnoController');
//Route::get('/home/ws/listado', 'ServiciosWebController@index')->name('api.ws');