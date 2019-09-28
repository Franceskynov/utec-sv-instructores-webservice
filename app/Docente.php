<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'oficina',
        'user_id',
        'is_enabled'
    ];

    public function especialidades()
    {
        return $this
            ->belongsToMany('App\Especialidad');
    }
}
