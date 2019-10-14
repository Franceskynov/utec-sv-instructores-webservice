<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
