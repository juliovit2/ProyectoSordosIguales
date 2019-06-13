<?php

namespace App\Http\Controllers\Auth;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/PortalAlumnos';

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
        $rut_value = request()->rut;
        $rut = DB::table('users')->where('rut', $rut_value)->value('rut');

        $password = request()->password;
        $clave = DB::table('users')->where('rut', $rut_value)->value('password');
        //dd($rut_value, $rut,$password,$clave);

        if ($rut == $rut_value && Hash::check($password, $clave)) {
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
        }

        if ($rut != $rut_value || $password != $clave) {
            return redirect()->back()->withInput()->withErrors('Rut o contraseña incorrectos');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only('rut', 'password');
        return $credentials;
    }
}
