<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rol
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol query()
 * @mixin \Eloquent
 */
class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = [
      'nombre',
      'descripcion'
    ];
}
