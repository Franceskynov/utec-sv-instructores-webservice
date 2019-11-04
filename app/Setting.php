<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Setting
 *
 * @property-read \App\Ciclo $ciclo
 * @property-read int $horas_sociales_a_asignar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 * @mixin \Eloquent
 * @property-read float $minimum_score
 * @property-read float $minimun_cum
 */
class Setting extends Model
{
    protected $fillable = [
        'ciclo_id',
        'horas_sociales_a_asignar',
        'docente_email_prefix',
        'instructor_email_prefix',
        'minimun_cum',
        'minimum_score'
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
     * @param $value
     * @return float
     */
    public function getminimunCumAttribute($value)
    {
        return (double) $value;
    }

    /**
     * @param $value
     * @return float
     */
    public function getminimumScoreAttribute($value)
    {
        return (double) $value;
    }

    /**
     * @return BelongsTo
     */
    public function ciclo()
    {
        return $this
            ->belongsTo('App\Ciclo', 'ciclo_id', 'id');
    }
}
