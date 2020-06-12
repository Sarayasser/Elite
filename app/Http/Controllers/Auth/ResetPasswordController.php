<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
// use Illuminate\Http\Request;
// use Illuminate\Auth\Passwords\PasswordBroker;
// use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
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

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    // /**
    //  * Reset the given user's password.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function reset(Request $request)
    // {
    //     $this->validate($request, $this->rules(), $this->validationErrorMessages());

    //     // These two lines below allow you to bypass the default validation.
    //     $broker = $this->broker();
    //     $broker->validate(function () { return true; });

    //     $response->reset(
    //         $this->credentials($request), function ($user, $password) {
    //             $this->resetPassword($user, $password);
    //         }
    //     );
    //     dd($response);
    //     return $response == Password::PASSWORD_RESET
    //                 ? $this->sendResetResponse($response) 
    //                 : $this->sendResetFailedResponse($request, $response);
    // }
}
