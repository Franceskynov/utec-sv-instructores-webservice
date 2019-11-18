<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Instructor;
use App\Docente;
use App\Coordinator;
use App\Setting;

/**
 * App\User
 *
 * @property-read mixed $created_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    public $settings;

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->settings = Setting::find(1);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'rol_id',
        'is_admin',
        'is_enabled',
        'is_activated',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     *
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this
            ->belongsTo('App\Rol', 'rol_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @param $param
     * @param $id
     * @return string
     */
    public static function getPeopleData($param, $id)
    {
        $result = '';
        switch ($param) {
            case 'Administrador':
                $result = [
                    'settings' => Setting::with('ciclo')->find(1),
                    'userData' => Coordinator::where('user_id', $id)->first()
                ];
                break;
            case 'Docente':
                $result = Docente::where('user_id', $id)->first();
                break;
            case 'Instructor':
                $result = Instructor::where('user_id', $id)->first();
                break;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'is_admin'  => $this->is_admin,
            'role'      => $this->rol->nombre,
            'descrpcn'  => $this->rol->descripcion,
            'username'  => $this->username,
            'email'     => $this->email,
            'people'    => self::getPeopleData($this->rol->nombre, $this->id)
        ];
    }

    /**
     * @param $roles
     * @return bool
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada para su rol');
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($this->rol()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }
}
