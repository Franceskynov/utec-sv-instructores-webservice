<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoeval extends Model
{
    protected $fillable = [
      'score',
      'comments'
    ];
}
