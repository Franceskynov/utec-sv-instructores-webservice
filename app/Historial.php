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
        'materia_id'
    ];

    public function materia()
    {
        return $this
            ->belongsTo('App\Materia', 'materia_id', 'id');
    }

    public function ciclo()
    {
        return $this
            ->belongsTo('App\Ciclo', 'ciclo_id', 'id');
    }
}
