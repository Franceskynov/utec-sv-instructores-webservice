<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $fillable = [
        'nombre',
        'descripcion',
        'is_enabled'
    ];
}
