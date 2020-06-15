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

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
  
    protected function credentials(Request $request){
        return ['email'=>$request[$this->username()],'password'=>$request->password,'is_banned'=> 0];
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('instructor')){
            return redirect('/dashboard/instructor');
        }else if($user->hasRole('parent')){
            return redirect('/dashboard/parent');
        }else if($user->hasRole('student')){
            return redirect('/dashboard/student');
        }else if($user->hasRole('admin')){
            return redirect('/admin/dashboard');
        }
        
    }
}
