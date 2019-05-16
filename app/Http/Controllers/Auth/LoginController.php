<?php

namespace App\Http\Controllers\Auth;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $mail = request()->email;
        $email = DB::table('users')->where('email', $mail)->value('email');

        $password = request()->password;
        $clave = DB::table('users')->where('email', $mail)->value('password');

        if ($email == $mail && password_verify($password, $clave)) {
            return view('Plataforma/PortalAlumnos');
        } else {
            if ($email != $mail || $password != $clave) {
                return redirect()->back()->withInput()->withErrors('Usuario o contraseña incorrectos');
            }
        }
    }
}
