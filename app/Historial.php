<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Historial
 *
 * @property-read \App\Ciclo $ciclo
 * @property-read \App\Docente $docente
 * @property-read mixed $nota
 * @property-read \App\Materia $materia
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial query()
 * @mixin \Eloquent
 */
class Historial extends Model
{
    protected $table = 'historiales';
    protected $fillable = [
        'nota',
        'comentarios',
        'ciclo_id',
        'materia_id',
        'docente_id'
    ];

    public function getnotaAttribute($value)
    {
        return number_format((float)$value, 2, '.', '');
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
    public function ciclo()
    {
        return $this
            ->belongsTo('App\Ciclo', 'ciclo_id', 'id');
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
