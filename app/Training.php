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

    public static function build($trainingId, $nota)
    {
        return [
            $trainingId => [
                'estado' => self::approbateNota($nota),
                'nota'   => self::validateNota($nota)
            ]
        ];
    }
}
