<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Exception;
use App\User;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request){
        if($request->user()->hasRole('admin'))
        {
            backpack_auth()->login($request->user());
            return redirect('/admin/dashboard');
        }else if($request->user()->hasRole('instructor')){
            return redirect("/");
        }else if($request->user()->hasRole('student')){
            return redirect("/calender");
        }else
            return redirect("/login");
        // }
        // return redirect('/');
    //    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //             // Authentication passed...
    //             if (!isset($request->user()->email_verified_at)) {
    //                 Auth::logout();
    //                 return redirect('/email/verify');
    //             }else if($request->user()->hasRole('admin'))
    //             {
    //                 backpack_auth()->login($request->user());
    //                 return redirect('/admin/dashboard');
    //             }else if($request->user()->hasRole('instructor')){
    //                 return redirect("/");
    //             }else if($request->user()->hasRole('student')){
    //                 return redirect("/calender");
    //             }else
    //                 return redirect("/login");


    //             return redirect($redirectTo);
    //         }
    }
    protected function credentials(Request $request){
        return ['email'=>$request[$this->username()],'password'=>$request->password,'is_banned'=> 0];
    }

}
