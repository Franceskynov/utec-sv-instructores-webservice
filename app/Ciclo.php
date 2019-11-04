<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ciclo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo query()
 * @mixin \Eloquent
 */
class Ciclo extends Model
{
    protected $table = 'ciclos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'is_enabled'
    ];
}
