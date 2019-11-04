<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Coordinator
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator query()
 * @mixin \Eloquent
 */
class Coordinator extends Model
{
    protected $table = 'coordinators';
    protected $fillable = [
        'nombre',
        'apellido',
        'user_id',
        'is_enabled',
        'telefono',
        'email_personal',
        'oficina'
    ];
}
