<?php

use Illuminate\Http\Request;
use App\Utils\Constants;

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
Route::resource('/docente', 'Api\DocenteController');
Route::resource('/instructor', 'Api\InstructorController');
Route::resource('/facultad', 'Api\FacultadController');
Route::resource('/school', 'Api\SchoolController');
Route::resource('/materia', 'Api\MateriaController');
Route::resource('/historial', 'Api\HistorialController');
Route::resource('/ciclo', 'Api\CicloController');
Route::resource('/edificio', 'Api\EdificioController');
Route::resource('/especialidad', 'Api\EspecialidadController');
Route::resource('/asignacion', 'Api\AsignacioneController');
Route::resource('/capacitacion', 'Api\TrainingController');
Route::resource('/instructor/capacitacion', 'Api\InstructorTrainingController');
Route::resource('/docente/materia', 'Api\DocenteMateriaController');
Route::resource('/asignacion/docente', 'Api\DocenteAsignacionController');
Route::resource('/sistema/preferencia', 'Api\SettingController');
Route::resource('/bulletin', 'Api\BulletinController');

Route::get('/dashboard', 'Api\DashboardController@index');

Route::post('/login', 'Security\AuthController@login');
Route::post('/logout', 'Security\AuthController@logout');
Route::get('/refresh', 'Security\AuthController@refresh');
Route::get('/checkInstructorByCarnet', 'Api\InstructorController@checkInstructorByCarnet');
Route::post('/credentials/checkUserByEmail', 'Security\CredentialsController@checkUserByEmail');
Route::post('/credentials/activateUser', 'Security\CredentialsController@activateUser');
Route::post('/credentials/accountRecover', 'Security\CredentialsController@accountRecover');
Route::post('/credentials/temporalUserActivation', 'Security\CredentialsController@temporalUserActivation');
Route::put('/credentials', 'Security\CredentialsController@update');

Route::get('/reporte/docentes', 'Reports\ReportBuilderController@docentes');
Route::get('/reporte/instructores', 'Reports\ReportBuilderController@instructores');
Route::get('/reporte/asignacion', 'Reports\ReportBuilderController@asignacion');
Route::get('/reporte/historial', 'Reports\ReportBuilderController@historial');
Route::get('/carrera', 'Api\InstructorController@carreras');
Route::get('/evaluation/checkSelfAppraisal', 'Api\EvaluationController@checkSelfAppraisal');
Route::post('/evaluation/evaluateSelfAppraisal', 'Api\EvaluationController@evaluateSelfAppraisal');
Route::post('/evaluation/humanResources', 'Api\EvaluationController@evaluateHumanResources');


Route::fallback(function(){
    return \Response::json([
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_RESOURCE_NOT_FOUND,
        Constants::DATA     => []
    ], 404);
});
