<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // Renvoyer la page de connexion
    public function login()
    {
        return view('connexion');
    }
    //Soumettre le formulaire de connexion
    protected function postLogin(Request $request)
    {
      // validate the info, create rules for the inputs
      $rules = array(
          'email'    => 'required|email', // make sure the email is an actual email
          'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
      );

      // run the validation rules on the inputs from the form
      $validator = Validator::make(
        array(
            'password' => $request['password'],
            'email' => $request['email']
        ), $rules);
      if ($validator->fails()) {
        return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
      } else {
        // create our user data for the authentication
        $userdata = array(
        'email'     => $request['email'],
        'password'  => $request['password']
      );
    }
    // attempt to do the login
    if (Auth::attempt($userdata)) {
      // validation successful!
      // redirect them to the secure section or whatever
      // return Redirect::to('secure');
      // for now we'll just echo success (even though echoing in a controller is bad)
      return 'SUCCESS!';
    } else {
      // validation not successful, send back to form
      return Redirect::to('user/login');
    }
  }
}
