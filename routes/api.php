<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/listado', 'AlumnoController@index');
Route::get('/nuevo', 'AlumnoController@create');
Route::post('/registrar', 'AlumnoController@store');
Route::get('/editar/{id}', 'AlumnoController@edit');
Route::put('/editar/{id}', 'AlumnoController@update');
Route::delete('/delete/{id}', 'AlumnoController@destroy');*/
