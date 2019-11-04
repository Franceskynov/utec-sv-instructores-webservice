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
 * App\Materia
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Docente[] $docentes
 * @property-read \App\School $escuela
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Facultad[] $facultades
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $instructorias
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia query()
 * @mixin \Eloquent
 */
class Materia extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'is_enabled',
        'school_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function facultades()
    {
        return $this
            ->belongsToMany('App\Facultad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instructorias()
    {
        return $this
            ->hasMany('App\Asignacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function docentes()
    {
        return $this
            ->belongsToMany('App\Docente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function escuela()
    {
        return $this
            ->belongsTo('App\School', 'school_id', 'id');
    }
}
