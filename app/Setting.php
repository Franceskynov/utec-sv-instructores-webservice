<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @property-read \App\Ciclo $ciclo
 * @property-read int $horas_sociales_a_asignar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $fillable = [
        'ciclo_id',
        'horas_sociales_a_asignar',
        'docente_email_prefix',
        'instructor_email_prefix'
    ];

    /**
     * @param $value
     * @return int
     */
    public function gethorasSocialesAAsignarAttribute($value)
    {
        return (int) $value;
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
