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


Route::get('/webservice',  'Soap\ServicioAlumnos@index');
Route::get('/pensum', 'Soap\ServicioAlumnos@pensum');
Route::get('/nota', 'Soap\ServicioAlumnos@notas');
Route::get('/expediente', 'Soap\ServicioAlumnos@expediente');

Route::resource('/edificio', 'Api\EdificioController');
Route::resource('/horario', 'Api\HorarioController');
