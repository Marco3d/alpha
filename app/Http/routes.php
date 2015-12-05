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
	'uses'=> 'Auth\AuthController@getLogin',
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
