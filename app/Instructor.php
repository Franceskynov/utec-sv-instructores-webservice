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
    protected $table = 'instructores';
    protected $fillable = [
        'nombre',
        'carnet',
        'carrera',
        'cum',
        'user_id',
        'telefono',
        'email_personal',
        'is_selected',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function notas()
    {
        return $this
            ->belongsToMany('App\Nota');
    }


    public function user()
    {
        return $this
            ->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function historial()
    {
        return $this
            ->belongsToMany('App\Historial');
    }
}
