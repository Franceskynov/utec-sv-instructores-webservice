<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\School
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School query()
 * @mixin \Eloquent
 */
class School extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
}
