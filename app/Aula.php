<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
    protected $fillable = [
        'codigo',
        'capacidad',
        'edificio_id',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edificio()
    {
        return $this
            ->belongsTo('App\Edificio', 'edificio_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function horarios()
    {
        return $this
            ->belongsToMany('App\Horario')
            ->withPivot('is_used');
    }

    /**
     * @param $id
     * @param $horario
     * @param string $mode
     * @return bool
     */
    public static function addHorarioToAula($id, $horario, $mode = 'create')
    {
        $row = Aula::find($id);
        if($mode == 'create')
        {
            if(gettype($horario) == 'integer')
            {
                if (Materia::find($horario))
                {
                    $row
                        ->horarios()
                        ->attach($horario, ['is_used' => false]);
                    return true;
                } else {
                    return false;
                }

            } else {

                try {
                    $row
                        ->horarios()
                        ->syncWithoutDetaching($horario,  ['is_used' => false]);
                    return true;
                } catch (\Exception $e) {
                    return false;
                }
            }

        } else {
            try {
                $row
                    ->horarios()
                    ->toggle($horario);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
