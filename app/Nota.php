<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Nota
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Instructor[] $instructores
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota query()
 * @mixin \Eloquent
 */
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
