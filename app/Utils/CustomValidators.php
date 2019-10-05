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
        'fin'        => 'required'
    ];

    /**
     * @var array
     */
    static $aulaRules = [
        'codigo'      => 'required|unique:aulas',
        'capacidad'   => 'required',
        'edificio_id' => 'required',
        'horarios'    => 'required'
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
        'telefono'       => 'required',
        'email'          => 'required|unique:users',
        'emailPersonal'  => 'required',
        'username'       => 'required|unique:users'
    ];

    static $asignacionRules = [
        'nombre'        => 'required',
        'ciclo_id'      => 'required',
        'horario_id'    => 'required',
        'aula_id'       => 'required',
        'instructor_id' => 'required',
        'materia_id'    => 'required'
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
