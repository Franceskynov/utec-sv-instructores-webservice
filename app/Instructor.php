<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nota;

class Instructor extends Model
{
    protected $table = 'instructores';
    protected $fillable = [
        'nombre',
        'carnet',
        'carrera',
        'cum',
        'user_id',
        'telefono',
        'email_personal',
        'score',
        'is_selected',
        'is_scholarshipped',
        'is_enabled'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function notas()
    {
        return $this
            ->belongsToMany('App\Nota');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this
            ->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function historial()
    {
        return $this
            ->belongsToMany('App\Historial');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function capacitaciones()
    {
        return $this
            ->belongsToMany('App\Training')
            ->withPivot('estado')
            ->withPivot('nota');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instructoria()
    {
        return $this
            ->hasMany('App\Asignacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaciones()
    {
        return $this
            ->hasMany('App\Asignacion');
    }

    /**
     * @param $id
     * @param $nota
     * @param string $mode
     * @return bool
     */
    public static function addNotasToInstructor($id, $nota, $mode = 'create')
    {
        $row = Instructor::find($id);
        if($mode == 'create')
        {
            if(gettype($nota) == 'integer')
            {
                if (Nota::find($nota))
                {
                    $row
                        ->notas()
                        ->attach($nota);
                    return true;
                } else {
                    return false;
                }

            } else {

                try {
                    $row
                        ->notas()
                        ->syncWithoutDetaching($nota);
                    return true;
                } catch (\Exception $e) {
                    return false;
                }
            }

        } else {
            try {
                $row
                    ->notas()
                    ->toggle($nota);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
