<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Edificio
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Aula[] $aulas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio query()
 * @mixin \Eloquent
 */
class Edificio extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'abreviacion',
        'descripcion',
        'pisos',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aulas()
    {
        return $this
            ->hasMany('App\Aula', 'edificio_id', 'id');
    }
}
