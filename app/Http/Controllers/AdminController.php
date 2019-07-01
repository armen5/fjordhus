<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Question;
use App\QuestionDetails;
use App\Section;

class AdminController extends Controller
{
    //

    public function __construct(){

    }
    public function index(){

    	$user = Auth::user();
    	return view('admin/index',compact('user'));
    }

    public function createNewQuestion(){
    	
    	if( request()->isMethod('post') ){
    		$question = request()->question .'';
    		$type   = (request()->has('question_type')) ? "individual" : "common";
    		$require  = (request()->has('require'))?'yes':'no';
 
    		$question = Question::create([	
    			'question' => $question,
    			'require'  => $require,
    			'type'     => $status,
    		]);

    		if( request()->has('answers') ){
    			$answers  = request()->answers;
	    		
	    		$answers = array_filter($answers,function( $answer ){
	    			return !is_null($answer);
	    		});
	    		$html_format = request()->has('html_format') ? 'checkbox' : 'radio';
	    		
	    		$question->setDetail( $question->id ,'html_format',$html_format);
	    		$question->setDetail( $question->id ,'answers',json_encode($answers));

	    	}else{

	    		$html_format  = 'input';
	    		$input_format = request()->has('input_format') ? 'string' : 'number';
	    		$question->setDetail( $question->id ,'html_format',$html_format);
	    		$question->setDetail( $question->id ,'input_format',$input_format);
	    	}

    		return redirect()->back()->with('message','Question Successfully Created');
    	}

    	return view('admin/createquestion');
    }


    public function commonQuestions(){
        dd(2);
    }

    public function createNewSection(){

        if( request()->isMethod('post') ){

            $validator = Validator::make(request()->all(), [
                'section'  => 'required|min:4|max:250',
            ]);

            if( $validator->fails() ){

                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->withInput();

            }else{
                $section = Section::create([
                    'name' => request()->section,
                    'slug' => strtolower(str_replace(' ',"_", request()->section))
                ]);
                return redirect()->back()->with('add','Section Successfully created');
            }
        }

        return view('admin/createsection');
    }
}
