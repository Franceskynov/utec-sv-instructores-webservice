<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $table = 'coordinators';
    protected $fillable = [
        'nombre',
        'apellido',
        'user_id',
        'is_enabled',
        'telefono',
        'email_personal',
        'oficina'
    ];
}
