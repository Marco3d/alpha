<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Route;
use Config;
use Lang;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $currentRoute = Route::currentRouteName();
       if ( $currentRoute == 'signup') {
           $rules = [
           'name' => [
                'required',
                'max:' .Config::get('user.name_max_length'),

             ],
             'username' => [
                'required',
                'unique:users',
                'regex:'.Config::get('user.username_regex'),
                'min:' .Config::get('user.username_min_length'),
                'max:' .Config::get('user.username_max_length'),

             ],
             'email' => [
                'required',
                'email',
                'unique:users',
                'max:' .Config::get('user.email_max_length'),

             ],
             'password' => [
                'required',

               'min:' .Config::get('user.password_min_length'),
               'max:' .Config::get('user.password_max_length'),
               'confirmed',

             ],

            'accept_disclaimer' => [
                'required',
                'in:accepted',

             ],

           ];
       }

        elseif ( $currentRoute == 'login') {
           $rules = [
           
             'email' => [
                'required',
                'email',
                'exists:users',
            

             ],
             'password' => [
                'required',
                //'exists:users',                 

             ],

              'remember_me' => [
                'in:true',                   

             ],



            

           ];
       }

       return $rules;
    }


    public function attributes()
    {

        return [
            
            'email'             => Lang::get('auth.signup_email') ,
            'name'              => Lang::get('auth.signup_name') ,
            'username'          => Lang::get('auth.signup_username'),
            'password'          => Lang::get('auth.signup_password'),
          
            

        ];

    }

    public function messages()
    {
        return [
            'username.unique'            => Lang::get('auth.username_error_unique'),
            'username.regex'            => Lang::get('auth.username_error_regex'),
            'email.unique'               => Lang::get('auth.email_error_unique'), 
            'email.exists'               => Lang::get('auth.email_error_exists'),
            'password.exists'            => Lang::get('auth.password_error_exists'),                                 
            'accept_disclaimer.required' => Lang::get('auth.accept_disclaimer_error'),
            'accept_disclaimer.in'       => Lang::get('auth.accept_disclaimer_error'),
        ];


    }


}
