<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'nombre',
        'carnet',
        'carrera',
        'cum',
        'notas'
    ];
}
