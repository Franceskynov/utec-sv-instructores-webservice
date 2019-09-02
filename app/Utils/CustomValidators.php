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
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    static function EdificioValidator($request)
    {
      return \Validator::make($request->all(), [
          'nombre'      => 'required',
          'direccion'   => 'required',
          'abreviacion' => 'required',
          'descripcion' => 'required',
          'pisos'       => 'required'
      ]);
    }

    static function HorarioValidator($request)
    {
        return \Validator::make($request->all(), [
            'dia'        => 'required',
            'nombre_dia' => 'required',
            'inicio'     => 'required',
            'fin'        => 'required'
        ]);
    }
}