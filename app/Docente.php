<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidad;
use App\Materia;
class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'oficina',
        'user_id',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function especialidades()
    {
        return $this
            ->belongsToMany('App\Especialidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materias()
    {
        return $this
            ->belongsToMany('App\Materia');
    }

    /**
     * @param $id
     * @param $especialidad
     * @param string $mode
     * @return bool
     */
    public static function addEspecialidadesToDocente($id, $especialidad, $mode = 'create')
    {
        $row = Docente::find($id);
        if($mode == 'create')
        {
            if(gettype($especialidad) == 'integer')
            {
                if (Especialidad::find($especialidad))
                {
                    $row
                        ->especialidades()
                        ->attach($especialidad);
                    return true;
                } else {
                    return false;
                }

            } else {

                try {
                    $row
                        ->especialidades()
                        ->syncWithoutDetaching($especialidad);
                    return true;
                } catch (\Exception $e) {
                    return false;
                }
            }

        } else {
            try {
                $row
                    ->especialidades()
                    ->toggle($especialidad);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param $id
     * @param $materia
     * @param string $mode
     * @return bool
     */
    public static function addMateriasToDocente($id, $materia, $mode = 'create')
    {
        $row = Docente::find($id);
        if($mode == 'create')
        {
            if(gettype($materia) == 'integer')
            {
                if (Materia::find($materia))
                {
                    $row
                        ->materias()
                        ->attach($materia);
                    return true;
                } else {
                    return false;
                }

            } else {

                try {
                    $row
                        ->materias()
                        ->syncWithoutDetaching($materia);
                    return true;
                } catch (\Exception $e) {
                    return false;
                }
            }

        } else {
            try {
                $row
                    ->materias()
                    ->toggle($materia);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
