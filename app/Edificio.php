<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'abreviacion',
        'descripcion',
        'pisos',
        'is_enabled'
    ];
}
