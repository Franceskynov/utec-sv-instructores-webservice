<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Administrator
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator query()
 * @mixin \Eloquent
 */
class Administrator extends Model
{
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
