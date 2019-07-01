<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Section;
use App\Quiz;
use Auth;

class QuestionController extends Controller
{
    //
    public function __construct(){

    }


    public function builderQuizzes(){

    	$commonsQuestions    = Question::where('type','common')->get();
        $individualQuestions = Question::where('type','individual')->get();
    	$sections  = Section::all();

        $halfAnswers = Quiz::where("user_id",Auth::id())->get();


        



        $questions = array();
        foreach ($commonsQuestions as &$common) {
    		
    		$common->html_format = $common->getDetailValue( $common->id ,'html_format');
    		if( $common->html_format == 'input' ){
    			$common->input_format = $common->getDetailValue( $common->id ,'input_format');
    		}else{
    			$common->answers = json_decode($common->getDetailValue( $common->id ,'answers'));
    		}
    	}
        $questions['common'] = $commonsQuestions;
        foreach ($individualQuestions as &$individual) {
            
            $individual->html_format = $individual->getDetailValue( $individual->id ,'html_format');
            if( $individual->html_format == 'input'){
                $individual->input_format = $individual->getDetailValue( $individual->id ,'input_format');
            }else{
                $individual->answers = json_decode($individual->getDetailValue( $individual->id ,'answers'));
            }
        }
        $questions['individual'] = $individualQuestions;

        $pendingAnswers = Quiz::where([
                                'user_id' =>auth()->id(),
                                'type' => 'pending'
                                ])->get();
        
        if( $pendingAnswers->isEmpty() ){
            $pendingAnswers = [];
        }else{
            $pendingAnswers = $pendingAnswers->first();
            $answers = unserialize($pendingAnswers->answers);
            $pendingAnswers->answers = $answers;
        }


       
        // dd($pendingAnswers);
        if ( null !== ($halfAnswers->first())) {
            // $answers = unserialize($halfAnswers->first()->answers);
            $answers = json_encode(unserialize($halfAnswers->first()->answers));


            $pendingAnswers = $pendingAnswers->toArray();
            
        }

            // dd($halfAnswers);



    	return view('builder/quizzes',compact('questions','sections','pendingAnswers','answers'));
    }

    public function quizzesAnswers(){


        $quiz = Quiz::where('user_id',auth()->id())->get();

        if( $quiz->isEmpty() ){
            // create new quiz for that user
            $answers [ request()->section_slug ][request()->question_id] = (object)[
                'section_id'  => request()->section_id,
                'question_id' => request()->question_id,
                'html_format' => request()->type,
                'answers'     => request()->answers
            ];
            $answers [ request()->section_slug ]['completed'] = request()->answers['0'] == 'No' ? 'yes' : 'no';


            $quiz = Quiz::create([
                'user_id' => auth()->id(),
                'type'    => 'pending',
                'answers' => serialize($answers),
                'completed' => request()->answers['0'] == 'No' ? 'yes' : 'no'
            ]);
            return response()->json($quiz,200);
        }
        else {
            // update quiz for that user
            $quiz = $quiz->first();
            $answers = unserialize($quiz->answers);
            $answers [ request()->section_slug ][request()->question_id] = (object)[
                'section_id'  => request()->section_id,
                'question_id' => request()->question_id,
                'html_format' => request()->type,
                'answers'     => request()->answers
            ];
            $answers [ request()->section_slug ]['completed'] = request()->answers['0'] == 'No' ? 'yes' :'no';
            $quiz->update(['answers' => serialize($answers)]);
            dd($answers);
            return response()->json($quiz,200);

        }
    }
}
