@extends('layouts.default')

@section('body')



<div class="container">
	<div class="div row">
		<div class="div col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">{{Lang::get('auth.password_reset_browser_title')}}</h3>
				</div>
				<div class="panel-body">

					@if($token_is_valid)

					@include('errors._form_with_error_alert')

					<p> {{ Lang::get('auth.password_reset_text')}} </p>


					{!! Form::open(['url' => URL::route('password_reset',[
						'user_email' =>urlencode($user_email),
						'password_reset_token' => $password_reset_token

					]),

					 'autocomplete' => 'off']) !!}

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

						 <div class="div form-group">
				    	{!!Form::submit(Lang::get('auth.password_reset_btn'),['class'=>'btn btn-primary'])!!}
				    	
				        </div>






								{!! Form::close() !!}

								@else
								<h3>{{Lang::get('auth.password_reset_token_invalid_body')}}</h3>
								<p>
									{{Lang::get('auth.password_reset_token_invalid_text')}}
								</p>
								<hr>

								<p>
									<a href="{{ URL::route('password_reset_request')}}" class="btn btn-primary">{{ Lang::get('auth.reset_password_call_to_action_alternative')}}</a>
								</p>




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