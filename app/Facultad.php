<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materia;

class Facultad extends Model
{
    protected $table = 'facultades';
    protected $fillable = [
        'nombre',
        'abreviacion',
        'descripcion',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function materias()
    {
        return $this
            ->belongsToMany('App\Materia');
    }

    /**
     * @param $id
     * @param $materia
     * @param string $mode
     * @return bool
     */
    public static function addMateriasToFacultad($id, $materia, $mode = 'create')
    {
        $row = Facultad::find($id);
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
