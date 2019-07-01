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
	

	    @if (\Session::has('add'))
		    <div class="alert alert-success message w-100">
		        {!! \Session::get('add') !!}
		    </div>
		@endif

        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">
              <h4 class="card-title">Create Question</h4>
            </div>
          </div>
        </div>

        <div id="view-icon-prefixes-two" class="active" style="display: block;">
          
          <p>Describe your Section</p><br>

          <div class="row">
            <form class="col-12" action="{{ route('admin.createSection') }}" method="post">
            	@csrf
              <div class="row">

                <div class="input-field col s12 question">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="icon_prefix2" class="materialize-textarea" name="section">{{old('section')}}</textarea>
                  <label for="icon_prefix2">Section</label>
					@if ($errors->has('section'))
						<div class="errorTxt4">
							<div id="cpassword-error" class="error" style="display: block;">
								<strong>{{ $errors->first('section') }}</strong>
							</div>
						</div>
					@endif
                </div>
	
              </div>
              <div class="footer w-100 row">
				  <div>
              	  	<button class="btn cyan waves-effect waves-light right question-submit" type="submit">Create<i class="material-icons right">send</i></button>
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
	
@endsection