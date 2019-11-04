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
 * App\Horario
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Aula[] $aulas
 * @property-read \App\Ciclo $ciclo
 * @property-read string $created_at
 * @property-read string $inicio
 * @property-read string $updated_at
 * @property-read string $fin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario query()
 * @mixin \Eloquent
 */
class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = [
        'dia',
        'nombre_dia',
        'inicio',
        'fin',
        'ciclo_id',
        'is_enabled'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getInicioAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    /**
     * @param $value
     * @return string
     */
    public function getfinAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }

    /**
     * @param $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aulas()
    {
        return $this
            ->belongsToMany('App\Aula');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo()
    {
        return $this
            ->belongsTo('App\Ciclo', 'ciclo_id', 'id');
    }
}
