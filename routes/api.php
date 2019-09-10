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
Route::resource('/aula', 'Api\AulaController');
Route::resource('/user', 'Api\UserController');
Route::resource('/instructor', 'Api\InstructorController');
Route::resource('/facultad', 'Api\FacultadController');
Route::resource('/materia', 'Api\MateriaController');
Route::resource('/historial', 'Api\HistorialController');

Route::post('/login', 'Security\AuthController@login');
Route::post('/logout', 'Security\AuthController@logout');
