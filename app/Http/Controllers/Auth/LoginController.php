<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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
      // Récupérer les infos du formulaire puis hasher le mot de passe pour le comparer
      $this->validate($request, [
        $this->username() => 'required', 'password' => 'required',
      ]);
    }
    public function username()
    {
      return 'email';
    }
}
