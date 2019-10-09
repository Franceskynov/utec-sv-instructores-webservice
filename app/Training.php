<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'docente_id',
        'is_enabled'
    ];
}
