<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = [
        'dia',
        'nombre_dia',
        'inicio',
        'fin',
        'is_enabled'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getInicioAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    /**
     * @param $value
     * @return string
     */
    public function getfinAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    public function aulas()
    {
        return $this
            ->belongsToMany('App\Aula');
    }
}
