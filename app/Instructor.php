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
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this
            ->hasMany('App\Nota', 'user_id', 'id');
    }
}
