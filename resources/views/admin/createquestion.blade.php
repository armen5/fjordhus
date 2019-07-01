@extends('layouts.admin')


{{-- <head></head> --}}
@section('header')
	<style>
		.input-type-text,.input-type-still{
			color:#ff4081;
		}
	</style>
@endsection


{{-- <div class='content'></div> --}}
@section('content')

<div class="row">
  <div class="col s12">
    <div id="icon-prefixes-two" class="card card-tabs">
      <div class="card-content">

        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">
              <h4 class="card-title">Create Question</h4>
            </div>
          </div>
        </div>

        <div id="view-icon-prefixes-two" class="active" style="display: block;">
          
          <p>Describe your question and add answer choices</p><br>

          <div class="row">
            <form class="col-12" action="{{ route('admin.addQuestion') }}" method="post">
            	@csrf
              <div class="row">

                <div class="input-field col s12 question">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="icon_prefix2" class="materialize-textarea" name="question"></textarea>
                  <label for="icon_prefix2">Cuestion</label>
                </div>

				<div class="question-options">
					{{-- dinamic added input --}}

				</div>	
              </div>
              <div class="footer w-100 row">
				  <div class=" col s6 m4 l2">
              	    <button type='button' class="btn btn-info add-option" style="background: #44369f;float: left;">Add Option</button>
              	  </div>
              	  <!-- Switch -->
				  <div class="switch col s6 m4 l2">
				    <label>
				      <span class="input-rc input-rc-uncheck">Radio</span>
				      <input type="checkbox" name="html_format" disabled>
				      <span class="lever"></span>
				      <span class='input-rc input-rc-check'>Checkbox</span>
				    </label>
				  </div>

				  <div class="switch col s6 m4 l2">
				    <label>
				      <span class="input-rc input-rc-uncheck input-type-text"> Number </span>
				      <input type="checkbox" name="input_format">
				      <span class="lever"></span>
				      <span class="input-rc input-rc-check">String</span>
				    </label>
				  </div>

				  <div class="switch col s6 m4 l2">
				    <label>
				      <span class="input-rc input-rc-uncheck input-type-text">Common</span>
				      <input type="checkbox" name="question_type">
				      <span class="lever"></span>
				      <span class='input-rc input-rc-check'>Individual</span>
				    </label>
				  </div>
				  
				  <div class=" col s6 m4 l2">
				  	<p>
				  		<label>
				  			<input type="checkbox" checked="checked" name="require" />
				  			<span>Require</span>
				  		</label>
				  	</p>
				  </div>
				  
				  {{-- <div><p><label><input type="checkbox" checked="checked" name="status" /><span>Active</span></label></p></div> --}}


				  <div>
              	  	<button disabled="disabled" class="btn cyan waves-effect waves-light right question-submit" type="submit">Create<i class="material-icons right">send</i></button>
              	  </div>
              </div>
            </form>
          </div>

        </div>


      </div>
    </div>
  </div>
</div>

@endsection


{{-- </body></html> --}}
@section('footer')

	<script>
		$(document).ready(function(){

			$(document).on("click",'.add-option',function(){

			    $('.invalid-feedback').remove();

				if($('textarea').val().trim() == '' ){
					$('.question').append(`      
						<div class="invalid-feedback" style='display:block;color:red;margin-left:45px;'>
        					Please describe your question ! 
      					</div>`
      				);
      				return;
				}

				$(`input[name='html_format']`).prop("disabled",false);
				$(`input[name='html_format']`).parent().find('.input-rc-uncheck').addClass('input-type-text');

				$(`input[name='input_format']`).prop("disabled",true);
				$(`input[name='input_format']`).parent().find('.input-rc').removeClass('input-type-text');


				let lenght = $('.question-options').data('options');
					lenght = lenght ? lenght + 1 : 1;
				
				let div = $(`
						<div class='col s12'>
							<div class="input-field col s6">
								<i class="material-icons prefix remove_circle" style="cursor: pointer;color: red!important" >remove_circle</i>
								<input id="option_${lenght}" type="text" name="answers[]" class="validate">
								<label for="option_${lenght}">Answer</label>
							</div>
						</div>`
					);
				$('.question-options').append( div );
				$('.question-options').data('options',lenght);
			});

			$(document).on('click','.remove_circle',function(){
				$(this).parent().remove();
			});

			$(document).on('input','textarea',function(){
				let val = $('textarea').val().trim();
				if( val !== '' ){
					$(".question-submit").prop("disabled",false);
				}else{
					$(".question-submit").prop("disabled",true);
				}
			});

			$(`input[name='html_format']`).change(function(){
				$(this).parent().find('.input-rc').removeClass('input-type-text')
				if( $(this).is(":checked") ){
					$(this).parent().find('.input-rc-check').addClass('input-type-text');
				}else{
					$(this).parent().find('.input-rc-uncheck').addClass('input-type-text');
				}
			});

			$(`input[name='input_format']`).change(function(){
				$(this).parent().find('.input-rc').removeClass('input-type-text');
				if( $(this).is(":checked") ){
					$(this).parent().find('.input-rc-check').addClass('input-type-text');
				}else{
					$(this).parent().find('.input-rc-uncheck').addClass('input-type-text');
				}
			});

			$(`input[name='question_type']`).change(function(){
				$(this).parent().find('.input-rc').removeClass('input-type-text');
				if( $(this).is(":checked") ){
					$(this).parent().find('.input-rc-check').addClass('input-type-text');
				}else{
					$(this).parent().find('.input-rc-uncheck').addClass('input-type-text');
				}
			});


		})
	</script>

@endsection