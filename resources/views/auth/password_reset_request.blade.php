@extends('layouts.default')

@section('body')



<div class="container">
	<div class="div row">
		<div class="div col-sm-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{Lang::get('auth.password_reset_request_browser_title')}}</h3>
				  </div>
				  <div class="panel-body">

				  @if(Session::get('password_reset_email'))

				   <p> {{ Lang::get('auth.password_reset_request_email_send_text')}} </p>
				   <p class ="text-center"><strong>{{Session::get('password_reset_email')}}</strong></p>
				<hr>

				   <p> {{ Lang::get('auth.password_reset_request_email_send_hint_text')}} </p>

				  @else


				   @include('errors._form_with_error_alert')

				  <p> {{ Lang::get('auth.password_reset_request_text')}} </p>

				 

				    {!! Form::open(['url' => URL::route('password_reset_request'), 'autocomplete' => 'off']) !!}
		    			   


				    <div class="form-group {{$errors->has('email')? 'has-error' : ""}}">
				    {!!Form::label('email',Lang::get('auth.signup_email'))!!}	
				    	{!!Form::text('email', null,[
				    	'class'      =>'form-control', 
				    	'placeholder'=>Lang::get('auth.signup_email_placeholder'),
				    	'maxlength'  =>Config::get('user.email_max_length')
				    	])!!}

						@if($errors->has('email'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('email')}}</p>
						@endif
				    </div>


				   




				  

				    <div class="div form-group">
				    	{!!Form::submit(Lang::get('auth.password_reset_btn'),['class'=>'btn btn-primary'])!!}
				    	
				    </div>

				    
				    
				    
				    {!! Form::close() !!}

				    @endif

					  </div>{{-- fin clase panel body --}}

					  
			</div>{{-- fin clase panel panel primary --}}
			
		</div> {{-- fin clase sm 6--}}

		<div class="div col-sm-6">
		<img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="Responsive image">

		</div>
		
	</div>{{-- fin clase row --}}

	
		
</div> {{-- fin clase container --}}
 

@endsection