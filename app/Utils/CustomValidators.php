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
        'edificio_id' => 'required'
    ];

    /**
     * @var array
     */
    static $facultadRules = [
        'nombre'      => 'required',
        'abreviacion' => 'required|unique:facultades',
        'descripcion' => 'required'
    ];

    /**
     * @param $request
     * @param $rules
     * @return \Illuminate\Validation\Validator
     */
    static function requestValidator($request, $rules)
    {
        return \Validator::make($request->all(), $rules);
    }
}
