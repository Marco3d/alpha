<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use Malahierba\Token\Token;

use App\User;
//use Illuminate\Foundation\Auth\ResetsPasswords;

use Lang;
use View;
use Config;
use Mail;
use URL;
use Redirect;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //mostrar formulario del password

      protected function getResetRequest()
    {
        
        $title = Lang::get('auth.password_reset_request_browser_title');
        return View::make('auth.password_reset_request', compact('title'));
    }

    //enviar formulario del password

      protected function postResetRequest(UserRequest $request)
    {
        
       $user = User::where('email',$request->input('email'))->first();
       $token = new Token($user, 
        'password reset', 
        Config::get('auth.password_reset_token.expire_in'), 
        Config::get('auth.password_reset_token.lenght')
        );

       $token_str = $token->get();  //obtenemos la cadena de texto del token

       //dd($token_str);

       //enviar email al usuario

       $data = [
        'title1'   => $user->name,
        'title'     => Lang::get('auth.password_reset_email_title'),
        'link'      => URL::route('password_reset',[
                'user_email'            => urlencode($user->email),
                'password_reset_token'  => $token_str,



            ]), 
       ];

       //dd($data);

       Mail::queue('auth.emails.password_reset_request', $data, function ($message) use($user){

              $message->to($user->email, $user->name);
              $message->subject(Lang::get('auth.password_reset_email_subject'));

       });

      return Redirect::route('password_reset_request')->with('password_reset_email', $user->email) ;



    }

    //password reset form

      protected function getReset($user_email,$password_reset_token)
    {
        //validar el token
      $token_is_valid = false;
    

   
       $user = User::where('email',$user_email)->first();


        if ($user) {

              $token = new Token($user, 
              'password reset' 
              
              );
             

          if ($token->check($password_reset_token))
             $token_is_valid = true;
        
      }

        $title = Lang::get('auth.password_reset_browser_title');
        return View::make('auth.password_reset', compact('title','token_is_valid', 'user_email','password_reset_token'));
    }


    //enviar formulario de recuperacion de contraseña

      protected function postReset($user_email, $password_reset_token, UserRequest $request)
    {
        
       dd('hasta aqui vamos');

      return Redirect::route('password_reset_request')->with('password_reset_email', $user->email) ;



    }





}
