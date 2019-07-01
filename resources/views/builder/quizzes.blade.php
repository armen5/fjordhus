@extends('layouts.app')


{{-- <head></head> --}}
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script><link rel="stylesheet" href="{{ asset('/css/quizzes.css') }}">
<style>
	body{
		background-image: url('https://backgrounddownload.com/wp-content/uploads/2018/09/builder-background-9.jpg');
		background-repeat: no-repeat;
		background-position: center;
		width: 99%;
	}
</style>
@endsection


{{-- <div class='content'></div> --}}
@section('content')

<!------ Include the above in your HEAD tag ---------->
<div class="questions-wrapper">

	{{-- example --}}
{{-- 	<div class="privew row">
	    <div class="inside questionsBox bg-white col-sm-12 col-md-4 col-lg-6 m-auto w-100">
	        <div class="questions text-center">Excavate & Lay Foundations</div>
	        <div class="section-question-answers">
	        	<div class="questionsRow text-center alert alert-info" style="background: #bee5eb!important;margin-bottom: 10px">{{ $questions['common']->pluck('question')->first() }}</div>
		        <div class="answerList">
		        	<p><label><input name="question_1" type="radio"><span>{{ $questions['common']->pluck('answers')->first()[1] }}</span></label></p>
		        	<p><label><input name="question_1" type="radio"><span>{{ $questions['common']->pluck('answers')->first()[0] }}</span></label></p>
		        </div>
		        <div class="questionsRow">
		        	<button type="button" class="btn btn-outline-primary" onClick="previousQuestions(this)" disabled="">Previous</button> 
		        	<button type="button" class="btn btn-outline-primary" onClick="nextQuestion(this)">Next</button>
		        </div>
		    </div>
	    	<div class="questionsRow alert alert-danger error-message text-center" style="background: #f8d7da!important;display: none;"></div>
	    </div>
	</div> --}}
	{{-- end example --}}

</div>
@endsection

{{-- </body></html> --}}
@section('footer')
	<script>
		const questions = <?= json_encode($questions)?>;
		const sections = <?= json_encode($sections)?>;
		const userAnswers = <?= json_encode($pendingAnswers)?>;

		
		


		const userId = {{ auth()->id() }};
		console.log(questions);
		console.log(sections);
		console.log(userAnswers);
		


	</script>


	<script>
		
		var questionsHistorty = new Array();
		var hasAnswer = false;
		
		$(document).ready( function(){

			// hera all sections with questions and questions answers and answer user 
			var sectionsHTML = new Array();

			var qCommon  = questions.common;
			var qIndividual = questions.individual;

			// create all section html view
			sections.forEach((section,index)=>{

				let sectionHTML = $(`
					<div class="privew row section section-box">
					    <div class="inside questionsBox bg-white col-sm-12 col-md-4 col-lg-6 m-auto w-100">
					        <div class="questions text-center">${section.name}</div>
					        <div class="section-question-answers">
								

								<div class="questionsRow">
						        	<button type="button" class="btn btn-outline-primary previous-question"  disabled="">Previous</button> 
						        	<button type="button" class="btn btn-outline-primary next-question" >Next</button>
						        </div>
						    </div>
					    	<div class="questionsRow alert alert-danger error-message text-center" style="background: #f8d7da!important;display: none;">Error Mesage</div>
					    </div>
					</div>`);
				sectionHTML.data('slug',section.slug);
				sectionHTML.data('section_id',section.id);

			    let commonQuestionHTML = new Array();
				qCommon.forEach(function(question,index){
					
					let div = $('<div class="question-main"></div>');
					let questionTitle = $(`<div class="questionsRow text-center alert alert-info" style="background: #bee5eb!important;margin-bottom: 10px">${question.question}</div>`);
					let questionAnswer = $(`<div class="answerList"></div>`);

					switch(question.html_format) {
					  case 'input':
							let div = $(`<div class="input-field"></div>`);
							let input = $(`<input id="answer_" type="text" class="validate" placeholder='Answer'>`);
								input.data('input_format',question.input_format);
								div.append(input);
								questionAnswer.append( div );
					    break;
					  case 'radio':
					       question.answers.forEach((answer,index)=>{
					       	 let p = $(`<p></p>`);
					       	 let label = $(`<label></label>`);
					       	 let input = $(`<input name="question_${question.id}" type="radio">`);
					       	 	 input.data('answer',answer);
					       	 let span  = $(`<span>${answer}</span>`);
					       	 	 label.append( input );
					       	 	 label.append( span );
					       	 	 p.append(label);
					       	 	 questionAnswer.append(p);
					       });
					    break;
					  case 'checkbox':
					       question.answers.forEach((answer,index)=>{
					       	 let p = $(`<p></p>`);
					       	 let label = $(`<label></label>`);
					       	 let input = $(`<input name="question_${question.id}" type="checkbox">`);
					       	 	 input.data('answer',answer);
					       	 let span  = $(`<span>${answer}</span>`);
					       	 	 label.append( input );
					       	 	 label.append( span );
					       	 	 p.append(label);
					       	 	 questionAnswer.append(p);
					       });
					    break;
					    
					}

					div.append(questionTitle);
					div.append(questionAnswer);
					commonQuestionHTML.push({'question':div,'answer':[],'question_id':question.id,'html_format':question.html_format});
				});
				sectionsHTML.push({'sectionHTML':sectionHTML,'commonQuestionsHTML':commonQuestionHTML});
			});


		function showFirstQuestionSection( section_id = 0 , question_id = 0 ){


			if (userAnswers.length != 0) {


				for (var us_ans in userAnswers.answers) {
				  	console.log(userAnswers.answers[us_ans])

				  	if (userAnswers.answers[us_ans]['completed'] === 'yes') {

						let section = sectionsHTML[ userAnswers.answers[us_ans][1].section_id - 1 ];
						let sectionHTML = section.sectionHTML;
						let commonQuestion = section.commonQuestionsHTML[ userAnswers.answers[us_ans][1].question_id ];
						

						// if (i < halfSec || i == halfSec && halfAns == 0) {
							$('.questions-wrapper').append( section.sectionHTML );
							sectionHTML.find('.section-question-answers').data('question_id',commonQuestion.question_id);
					 		sectionHTML.find('.section-question-answers').data('html_format',commonQuestion.html_format);
							sectionHTML.find('.section-question-answers').prepend(`
								<div class="text-center pb-4">
									<img src = '/svg/ignor.png' style="width: 130px;">
								</div>
							`);

							sectionHTML.find(".questionsRow").remove();

						// }
						// else if (i == halfSec && halfAns != 0) {

						// }
				  	}
				  	else {

						console.log(userAnswers.answers[us_ans])

						var question_id = Object.keys(userAnswers.answers[us_ans])[Object.keys(userAnswers.answers[us_ans]).length-2]
						console.log(+question_id)
						setNextQuestion(+userAnswers.answers[us_ans][1].section_id-1 , +question_id);

				  	}

				}
			}
			else {

				let section = sectionsHTML[ section_id ];
				let sectionHTML = section.sectionHTML;
				let commonQuestion = section.commonQuestionsHTML[ question_id ];
				
			 	$('.questions-wrapper').append( section.sectionHTML );
			 	sectionHTML.find('.section-question-answers').data('question_id',commonQuestion.question_id);
			 	sectionHTML.find('.section-question-answers').data('html_format',commonQuestion.html_format);
			 	sectionHTML.find('.section-question-answers').prepend(commonQuestion.question);
			}

		}	
		showFirstQuestionSection();

		function setNextQuestion( section_id = 0 , question_id = 0 ){

			console.log(section_id , question_id)

			let section = sectionsHTML[ section_id ];
			let sectionHTML = section.sectionHTML;
			let commonQuestion = section.commonQuestionsHTML[ question_id ];
			$('.questions-wrapper').append( section.sectionHTML );

			sectionHTML.find('.section-question-answers .question-main').remove();

		 	sectionHTML.find('.section-question-answers').data('question_id',commonQuestion.question_id);
		 	sectionHTML.find('.section-question-answers').data('html_format',commonQuestion.html_format);
		 	sectionHTML.find('.section-question-answers').prepend(commonQuestion.question);
		}


		 // AJAX REQUEST

			function setAnswer( data ,self){
				// console.log("kol");
				data._token = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
					url:'/quezzes/answers',
					type:'post',
					data:data,
					success:function(response){
						section_id = Number(data.section_id) - 1;
						let question_id = Number(data.question_id);

						if( question_id == 1 && data.answers[0] === 'No'){
							// this section iz completed return next section
							if(section_id == 4) {
								alert('end'); 
								return;
							}

							// this next section data in sectionsHTML array	
							section_id = section_id + 1;
							$(self).parents('.section-question-answers').empty().append(`
								<div class="text-center pb-4">
									<img src = '/svg/ignor.png' style="width: 130px;">
								</div>
								`);
							showFirstQuestionSection( section_id );
							return;
						} 

						setNextQuestion( section_id , question_id );
					}
				})
			}
		 // END AJAX REQUEST

		 $(document).on('click','.next-question',function(){



		 	let html_format = $(this).parents('.section-question-answers').data('html_format');
		 	let issetAnswer = false;
		  	let answers = new Array();

			 switch(html_format) {

			  case 'radio':

			 		$('.answerList input').each(function(){
			 			if( $(this).is(":checked") ){
			 				issetAnswer = true;
			 				answers.push( $(this).data('answer') );
			 				return;
			 			}
			 		});

			 		checkAnswer( issetAnswer , answers ,'radio' , this );

			    break;
			  case 'checkbox':

			 		$('.answerList input').each(function(){
			 			if( $(this).is(":checked") ){
			 				issetAnswer = true;
			 				answers.push( $(this).data('answer') );

			 			}
			 		});

			 		checkAnswer( issetAnswer , answers ,'checkbox' , this );
			    break;
			  default:
			  		answers.push($('.answerList input').val());
			  		issetAnswer = $('.answerList input').val() ? true : false ;
			  		checkAnswer( issetAnswer , answers ,'input' , this );
			}



		 })



		function checkAnswer( issetAnswer , answers , type , self ){
			let data = {};
				data.section_id = $(self).parents('.section-box').data('section_id');
		 		data.section_slug = $(self).parents('.section-box').data('slug');
		 		data.question_id = $(self).parents('.section-question-answers').data('question_id');
		 		data.answers = answers;
		 		data.type = type;

		 	if( issetAnswer ){
		 		setAnswer( data ,self )
		 	}else{
		 		$(self).parents('.section-box').find('.error-message').slideDown(500,function(){
		 			setTimeout(()=>{
		 				$('.error-message').slideUp(500)
		 			},2000)
		 		})
		 	}

		 	// console.log(data)
		}

		$(document).on('input','input[type=text]',function(){
			let format  = $(this).data('input_format');
			let value = $(this).val();
			$('.answerList input').val(  validateAnswer( format , value ) );
		})

		function validateAnswer( format , val , self ){

			if( format = 'number' ){	
	        	let reg = /^\.?(?!-)\d+(?:\.\d{1,2})?$/;
		        if( val[0] == '.'){
		            val = val.slice(1,0);
		        }
		        if( val[0] == '0'){
		            if( val[1] && val[1] !='.'){
		                val = val.slice(1,1);
		            }
		        }
		        var filtered = val.replace(/[^0-9.]/g, '').split('.')
		        var integer = filtered.shift()
		        var hasDecimal = filtered.length > 0
		        var fraction = filtered.join('').slice(0, 4)
		        val = integer + (hasDecimal ? '.' + fraction : '');
		        return val;
			}

		}

		});
	</script>
	{{-- <script src="{{ asset('/js/quizzes.js') }}"></script> --}}
@endsection