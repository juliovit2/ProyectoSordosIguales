<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /*public function sendsResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        switch ($response) {
            case \Password::INVALID_USER:
                return response()->error($response, 422);
                break;

            case \Password::INVALID_PASSWORD:
                return response()->error($response, 422);
                break;

            case \Password::INVALID_TOKEN:
                return response()->error($response, 422);
                break;
            default:
                return response()->success($response, 200);
        }
    }*/
}
