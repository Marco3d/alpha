@extends('layouts.default')

@section('body')



<div class="container">
	<div class="div row">
		<div class="div col-sm-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{Lang::get('auth.login_browser_title')}}</h3>
				  </div>
				  <div class="panel-body">

				    {!! Form::open(['url' => URL::route('login'), 'autocomplete' => 'off']) !!}
		    			   


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


				    <div class="form-group {{$errors->has('password')? 'has-error' : ""}}">
				    {!!Form::label('password',Lang::get('auth.signup_password'))!!}	
				    	{!!Form::password('password',[
				    	'class'      =>'form-control', 
				    	'placeholder'=>Lang::get('auth.signup_password_placeholder'),
				    	'maxlength'  =>Config::get('user.password_max_length')
				    	])!!}

						@if($errors->has('password'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('password')}}</p>
						@endif
				    </div>



				     <div class="checkbox {{$errors->has('remember_me')? 'has-error' : ""}}">

				    <label>

				    	{!!Form::checkbox('remember_me', 'true')!!} 
				    	{!!Lang::get('auth.login_remember_me')!!}

				    </label>	
				    	
						@if($errors->has('remember_me'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('remember_me')}}</p>
						@endif
				    </div>




				  

				    <div class="div form-group">
				    	{!!Form::submit(Lang::get('auth.login_btn'),['class'=>'btn btn-primary'])!!}
				    </div>

				    
				    
				    
				    {!! Form::close() !!}

					  </div>{{-- fin clase panel body --}}

					  <div class="div panel-footer">
					    <a href="{{ URL::route('signup')}}" class="btn btn-link btn-block">{{Lang::get('auth.signup_call_to_action')}}</a>
					  </div>

			</div>{{-- fin clase panel panel primary --}}
			
		</div> {{-- fin clase sm 6--}}

		<div class="div col-sm-6">
		<img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="Responsive image">

		</div>
		
	</div>{{-- fin clase row --}}

	
		
</div> {{-- fin clase container --}}
 

@endsection