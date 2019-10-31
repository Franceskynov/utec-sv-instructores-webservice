<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'docente_id',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this
            ->belongsTo('App\Docente', 'docente_id', 'id');
    }

    /**
     * @param $nota
     * @return int
     */
    public static function validateNota($nota)
    {
        return ($nota < 0) ? 0 :
               ($nota < -1) ? 0:
                ($nota > 10) ? 10 : $nota;
    }

    /**
     * @param $nota
     * @return string
     */
    public static function approbateNota($nota)
    {
        return ($nota >= 7) ? 'Aprobado' : 'Desaprobado';
    }

    /**
     * @param $trainingId
     * @param $nota
     * @param $cicloId
     * @param $cicloNombre
     * @return array
     */
    public static function build($trainingId, $nota, $cicloId, $cicloNombre)
    {
        return [
            $trainingId => [
                'estado' => self::approbateNota($nota),
                'nota'   => self::validateNota($nota),
                'ciclo_id' => $cicloId,
                'ciclo_nombre' => $cicloNombre
            ]
        ];
    }
}
