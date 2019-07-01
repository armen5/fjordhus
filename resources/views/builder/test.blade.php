@extends('layouts.app')


{{-- <head></head> --}}
@section('header')
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
	}
</style>
@endsection


{{-- <div class='content'></div> --}}
@section('content')

<!------ Include the above in your HEAD tag ---------->
	<div class="privew row">
	    <div class="questionsBox bg-white col-sm-12 col-md-4 col-lg-6 m-auto">
	        <div class="questions">Which of the following is correct about data-keyboard Data attribute of Modal Plugin?</div>
	        <ul class="answerList">
	            <li>
	                <label>
	                    <input type="radio" name="answerGroup" value="0" id="answerGroup_0"> It specifies static for a backdrop, if you don't want the modal to be closed when the user clicks outside of the modal.</label>
	            </li>
	            <li>
	                <label>
	                    <input type="radio" name="answerGroup" value="1" id="answerGroup_1"> It closes the modal when escape key is pressed; set to false to disable.</label>
	            </li>
	            <li>
	                <label>
	                    <input type="radio" name="answerGroup" value="2" id="answerGroup_2"> It shows the modal when initialized.</label>
	            </li>
	            <li>
	                <label>
	                    <input type="radio" name="answerGroup" value="3" id="answerGroup_3"> Using the jQuery .load method, injects content into the modal body. If an href with a valid URL is added, it will load that content.</label>
	            </li>
	        </ul>
	        <div class="questionsRow">
	        	<button type="button" class="btn btn-outline-primary" onClick="previousQuestions(this)">Previous</button> 
	        	<button type="button" class="btn btn-outline-primary" onClick="nextQuestions(this)">Next</button>
	        	<span>
	        		<i class="curent-question-page">2</i>
	        		of
	        		<i class="count-questions">20</i>
	        	</span>
	        </div>
	    </div>
	</div>
@endsection

{{-- </body></html> --}}
@section('footer')
	<script>
		const QUESTIONS = <?= json_encode($questions)?>;
		console.log(QUESTIONS);
	</script>
	<script src="{{ asset('/js/quizzes.js') }}"></script>
@endsection

				// let sectionHTML = $(`
				// 	<div class="privew row section section-box">
				// 	    <div class="inside questionsBox bg-white col-sm-12 col-md-4 col-lg-6 m-auto w-100">
				// 	        <div class="questions text-center">${section.name}</div>


				// 	        <div class="section-question-answers" data-question_id = '${qCommon[0].id}' data-html_format = 'radio'>
				// 	        	<div class="questionsRow text-center alert alert-info" style="background: #bee5eb!important;margin-bottom: 10px">${qCommon[0].question}</div>
				// 		        <div class="answerList">
				// 		        	<p><label><input name="question_1" type="radio" data-answer="yes"><span>${qCommon[0].answers[1]}</span></label></p>
				// 		        	<p><label><input name="question_1" type="radio" data-answer="no"><span>${qCommon[0].answers[0]}</span></label></p>
				// 		        </div>
				// 		        <div class="questionsRow">
				// 		        	<button type="button" class="btn btn-outline-primary previous-question"  disabled="">Previous</button> 
				// 		        	<button type="button" class="btn btn-outline-primary next-question" >Next</button>
				// 		        </div>
				// 		    </div>



				// 	    	<div class="questionsRow alert alert-danger error-message text-center" style="background: #f8d7da!important;display: none;"></div>
				// 	    </div>
				// 	</div>`);