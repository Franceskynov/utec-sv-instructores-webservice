<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Asignacion
 *
 * @property-read \App\Aula $aula
 * @property-read \App\Ciclo $ciclo
 * @property-read \App\Docente $docente
 * @property-read \App\Horario $horario
 * @property-read \App\Instructor $instructor
 * @property-read \App\Materia $materia
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion query()
 * @mixin Eloquent
 */
class Asignacion extends Model
{
    protected $table = 'asignacions';
    protected $fillable = [
        'nombre',
        'ciclo_id',
        'horario_id',
        'aula_id',
        'instructor_id',
        'materia_id',
        'docente_id',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciclo()
    {
        return $this
            ->belongsTo('App\Ciclo', 'ciclo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horario()
    {
        return $this
            ->belongsTo('App\Horario', 'horario_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor()
    {
        return $this
            ->belongsTo('App\Instructor', 'instructor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
        return $this
            ->belongsTo('App\Materia', 'materia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aula()
    {
        return $this
            ->belongsTo('App\Aula', 'aula_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this
            ->belongsTo('App\Docente', 'docente_id', 'id');
    }
}
