<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $fillable = [
        'mat_codigo',
        'mat_nombre',
        'nota',
        'estado',
        'ciclo'
    ];

    public function instructores()
    {
        return $this
            ->belongsToMany('App\Instructor');
    }
}
