<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    protected $fillable = [
        'question','section_id','require','status'
    ];

    public function getDetailValue( $question_id , $detail )
    {
        $row = QuestionDetails::where([['question_id','=',"$question_id"],['detail','=', "$detail"]])->get();
        return ( $row->isEmpty() ) ? '' : $row->pluck('value')->first();
    }
    
    public function updateDetailValue( $question_id , $detail , $value )
    {
        $res = QuestionDetails::where([['question_id','=',"$question_id"],['detail','=', "$detail"]])->update( ['value' => $value] );
        return $res ? $res : $this->setMeta( $question_id , $detail , $value );
    }

    public function setDetail( $question_id , $detail , $value )
    {      
        return QuestionDetails::create(['question_id' => $question_id,'detail' => $detail,'value' => $value]);
    }

    public function deleteDetail( $question_id , $detail )
    {
        return QuestionDetails::where([['question_id','=',"$question_id"],['detail','=', "$detail"]])->delete();
    }

}
