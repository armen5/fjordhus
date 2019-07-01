<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionDetails extends Model
{
    //

    protected $fillable = [
        'detail','question_id','value'
    ];
}
