<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => 'WebController@getHome', 
	'as' => 'home']);

Route::get('/test',function(){
	Session::flash('alert.info', 'esto es una alerta');
	return Redirect::route('home');

});

//login
Route::get('auth/login', [
	'uses'=> 'Auth\AuthController@getLogin',
	'as' => 'login'
	]);

Route::post('auth/login', [
	'uses'=> 'Auth\AuthController@postLogin',
	'as' => 'login'
	]);


//registro
Route::get('auth/signup', [
	'uses'=> 'Auth\AuthController@getSignup',
	'as' => 'signup'
	]);

Route::post('auth/signup', [
	'uses'=> 'Auth\AuthController@postSignup',
	'as' => 'signup'
	]);

 //salir
Route::get('auth/logout', [
	'uses'=> 'Auth\AuthController@getLogout',
	'as' => 'logout'
	]);

 //password reset request

Route::get('auth/password_reset/request', [
	'uses'=> 'Auth\PasswordController@getResetRequest',
	'as' => 'password_reset_request'
	]);

Route::post('auth/password_reset/request', [
	'uses'=> 'Auth\PasswordController@postResetRequest',
	'as' => 'password_reset_request'
	]);



//password reset

Route::get('auth/password_reset/{user_email}/{password_reset_token}', [
	'uses'=> 'Auth\PasswordController@getReset',
	'as' => 'password_reset'
	]);

Route::post('auth/password_reset/{user_email}/{password_reset_token}', [
	'uses'=> 'Auth\PasswordController@postReset',
	'as' => 'password_reset'
	]);