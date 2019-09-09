<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $fillable = [
        'nombre',
        'descripcion',
        'facultad_id'
    ];
}
