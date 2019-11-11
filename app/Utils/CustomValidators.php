<?php

    /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Utils;


class CustomValidators
{

    /**
     * @var array
     */
    static $edificioRules = [
        'nombre'      => 'required',
        'direccion'   => 'required',
        'abreviacion' => 'required',
        'descripcion' => 'required',
        'pisos'       => 'required'
    ];

    /**
     * @var array
     */
    static $horarioRules = [
        'dia'        => 'required',
        'nombre_dia' => 'required',
        'inicio'     => 'required',
        'fin'        => 'required',
        'ciclo_id'   => 'required'
    ];

    /**
     * @var array
     */
    static $evaluateRules = [
        'instructorId'   => 'required',
        'asignacionName' => 'required',
        'score'          => 'required'
    ];

    /**
     * @var array
     */
    static $evaluateRHRules = [
        'historialId'   => 'required',
        'score'         => 'required'
    ];

    /**
     * @var array
     */
    static $settingRules = [
        'ciclo_id'                 => 'required',
        'horas_sociales_a_asignar' => 'required',
        'docente_email_prefix'     => 'required',
        'instructor_email_prefix'  => 'required'
    ];

    /**
     * @var array
     */
    static $aulaRules = [
        'codigo'      => 'required|unique:aulas',
        'capacidad'   => 'required',
        'edificio_id' => 'required',
        // 'horarios'    => 'required'
    ];

    /**
     * @var array
     */
    static $facultadRules = [
        'nombre'      => 'required',
        'abreviacion' => 'required|unique:facultades',
        'descripcion' => 'required',
        'materias'    => 'required'
    ];

    /**
     * @var array
     */
    static $materiaRules = [
        'nombre'      => 'required',
        'descripcion' => 'required',
        'school_id' => 'required',
    ];

    static $schoolRules = [
        'name'      => 'required',
        'description' => 'required',
    ];

    /**
     * @var array
     */
    static $credentialsRules = [
        'oldPassword' => 'required',
        'password'    => 'required|min:6'
    ];

    /**
     * @var array
     */
    static $checkByEmailRules = [
        'email' => 'required|email'
    ];

    /**
     * @var array
     */
    static $activateCreadentialsRule = [
        'email'    => 'required|email',
        'password' => 'required'
    ];

    /**
     * @var array
     */
    static $instructorMateriaRules = [
        'nota'         => 'required',
        'instructorId' => 'required',
        'trainingId'   => 'required'
    ];

    /**
     * @var array
     */
    static $docenteMateriaRules = [
        'docenteId' => 'required',
        'materias'  => 'required',
    ];

    /**
     * @var array
     */
    static $docenteAsignacionRules = [
        'nota'         => 'required',
        'comentarios'  => 'required',
        'instructorId' => 'required'
    ];

    /**
     * @var array
     */
    static $trainingRules = [
        'nombre'      => 'required',
        'descripcion' => 'required',
        'tipo'        => 'required',
        'docente_id'  => 'required',
    ];

    /**
     * @var array
     */
    static $cicloRules = [
        'nombre'      => 'required',
        'descripcion' => 'required',
    ];

    static $especialidadRules = [
        'nombre'      => 'required',
        'descripcion' => 'required',
    ];

    /**
     * @var array
     */
    static $docenteRules = [
        'nombre'     => 'required',
        'apellido'   => 'required',
        'email'      => 'required',
        'telefono'   => 'required',
        'oficina'    => 'required',
        'especialidades' => 'required',
    ];

    /**
     * @var array
     */
    static $instructorRules = [
        'nombre'         => 'required',
        'carnet'         => 'required|unique:instructores',
        'carrera'        => 'required',
        'cum'            => 'required',
        // 'telefono'       => 'required',
        'email'          => 'required|unique:users',
        // 'emailPersonal'  => 'required',
        'username'       => 'required|unique:users',
        // 'is_scholarshipped' => 'required',
    ];

    static $asignacionRules = [
        'nombre'        => 'required',
        'ciclo_id'      => 'required',
        // 'horario_id'    => 'required',
        'aula_id'       => 'required',
        'instructor_id' => 'required',
        'materia_id'    => 'required',
        'nombre_dia'    => 'required',
    ];

    /**
     * @param $request
     * @param $rules
     * @return \Illuminate\Contracts\Validation\Validator
     */
    static function requestValidator($request, $rules)
    {
        return \Validator::make($request->all(), $rules);
    }
}
