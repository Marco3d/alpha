<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserRequest;

use View;
use Lang;
use Auth;
use Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->middleware('auth.strict', ['only' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getSignup()
    {
        
        $title = Lang::get('auth.signup_browser_title');
        return View::make('auth.signup', compact('title'));
    }



     protected function postSignup(UserRequest $request)
     {
        $user = User::create($request-> only('name','email','username','password'));
        Auth::login($user);

        return Redirect::route('home')->with('alert.success', Lang::get('auth.signup_success_alert'));
       
        
     }

      protected function getLogout()
     {
        Auth::logout();
        return Redirect::route('home')->with('alert.success', Lang::get('auth.logout_success_alert'));
       
       
        
     }


      protected function getLogin()
    {
        
        $title = Lang::get('auth.login_browser_title');
        return View::make('auth.login', compact('title'));
    }

     protected function postLogin(UserRequest $request)
     {
        if (Auth::attempt($request->only('email','password'), $request->has('remember_me'))) 
        
            return Redirect::intended();

            return Redirect::route('login')
            ->withInput($request->only('email','remember_me'))
            ->withErrors([
                    'email' =>Lang::get('auth.email_error_login'),
                ]);
        
       
        
     }


}
