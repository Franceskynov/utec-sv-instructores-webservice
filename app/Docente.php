<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function especialidades()
    {
        return $this
            ->belongsToMany('App\Especialidad');
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
                if (Materia::find($especialidad))
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
}
