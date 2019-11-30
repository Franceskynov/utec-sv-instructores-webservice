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
use App\Setting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Instructor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Training[] $capacitaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Historial[] $historial
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $instructoria
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Nota[] $notas
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor query()
 * @mixin \Eloquent
 * @property-read string $instructor_email
 */
class Instructor extends Model
{
    public $settings;
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

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->settings = Setting::find(1);
    }

    /**
     * @return belongsToMany
     */
    public function notas()
    {
        return $this
            ->belongsToMany('App\Nota');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this
            ->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return belongsToMany
     */
    public function historial()
    {
        return $this
            ->belongsToMany('App\Historial');
    }

    /**
     * @return belongsToMany
     */
    public function capacitaciones()
    {
        return $this
            ->belongsToMany('App\Training')
            ->withPivot('estado')
            ->withPivot('nota')
            ->withPivot('ciclo_nombre')
            ->withPivot('ciclo_id');
    }

    /**
     * @return HasMany
     */
    public function instructoria()
    {
        return $this
            ->hasMany('App\Asignacion');
    }

    /**
     * @return HasMany
     */
    public function asignaciones()
    {
        return $this
            ->hasMany('App\Asignacion');
    }

    /**
     * @return string
     */
    public function getInstructorEmailAttribute()
    {

        return $this->carnet . $this->settings->instructor_email_prefix;
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
