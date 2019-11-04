<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Especialidad
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad query()
 * @mixin \Eloquent
 */
class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $fillable = [
        'nombre',
        'descripcion',
        'is_enabled'
    ];
}
