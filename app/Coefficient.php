<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coefficient extends Model
{
    //
    protected $fillable = [
        'name', 'slug', 'coefficient',
    ];
}
