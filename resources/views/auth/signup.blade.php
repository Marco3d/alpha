@extends('layouts.default')

@section('body')



<div class="container">
	<div class="div row">
		<div class="div col-sm-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{Lang::get('auth.signup_browser_title')}}</h3>
				  </div>
				  <div class="panel-body">

				    {!! Form::open(['url' => URL::route('signup'), 'autocomplete' => 'off']) !!}

				    <div class="form-group {{$errors->has('name')? 'has-error' : ""}}">
				    {!!Form::label('name',Lang::get('auth.signup_name'))!!}	
				    	{!!Form::text('name', null,[
				    	'class'      =>'form-control', 
				    	'placeholder'=>Lang::get('auth.signup_name_placeholder'),
				    	'maxlength'  =>Config::get('user.name_max_length')
				    	])!!}

						@if($errors->has('name'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('name')}}</p>
						@endif
				    </div>


				    <div class="form-group {{$errors->has('username')? 'has-error' : ""}}">
				    {!!Form::label('username',Lang::get('auth.signup_username'))!!}	
				    	{!!Form::text('username', null,[
				    	'class'      =>'form-control', 
				    	'placeholder'=>Lang::get('auth.signup_username_placeholder'),
				    	'maxlength'  =>Config::get('user.username_max_length')
				    	])!!}

						@if($errors->has('username'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('username')}}</p>
						@endif
				    </div>


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


				    <div class="form-group {{$errors->has('password_confirmation')? 'has-error' : ""}}">
				    {!!Form::label('password_confirmation',Lang::get('auth.signup_password_confirmation'))!!}	
				    	{!!Form::password('password_confirmation',[
				    	'class'      =>'form-control', 
				    	'placeholder'=>Lang::get('auth.signup_password_confirmation_placeholder'),
				    	'maxlength'  =>Config::get('user.password_max_length')
				    	])!!}

						@if($errors->has('password_confirmation'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('password_confirmation')}}</p>
						@endif
				    </div>

				     <div class="checkbox {{$errors->has('accept_disclaimer')? 'has-error' : ""}}">

				    <label>

				    	{!!Form::checkbox('accept_disclaimer', 'accepted')!!} 
				    	{!!Lang::get('auth.signup_accept_disclaimer',[
				    		'tos_url' => URL::route('home'),
				    		'privacy_url' => URL::route('home'),
				    		'app_name' => $app_name


				    	])!!}

				    </label>	
				    	
						@if($errors->has('accept_disclaimer'))
						<p class = "text-danger"><i class="fa fa-exclamation-circle"></i> {{$errors->first('accept_disclaimer')}}</p>
						@endif
				    </div>




				  

				    <div class="div form-group">
				    	{!!Form::submit(Lang::get('auth.signup_btn'),['class'=>'btn btn-primary'])!!}
				    </div>

				    
				    
				    
				    {!! Form::close() !!}

					  </div>{{-- fin clase panel body --}}

					  <div class="div panel-footer">
					    <a href="{{ URL::route('login')}}" class="btn btn-link btn-block">{{Lang::get('auth.login_call_to_action')}}</a>
					  </div>

			</div>{{-- fin clase panel panel primary --}}
			
		</div> {{-- fin clase sm 6--}}

		<div class="div col-sm-6">
		<img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="Responsive image">

		</div>
		
	</div>{{-- fin clase row --}}

	
		
</div> {{-- fin clase container --}}
 

@endsection