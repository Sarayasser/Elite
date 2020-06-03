<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    protected function redirectTo()
    {
        
        if (auth()->user()->hasRole('admin')) {
            return '/admin';
        }
        return '/home';
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric',"regex:/(01)[0-9]{9}/"],
            'address' => ['required', 'string', 'max:255'],
            'gender'=> ['required'], 
            'image' => ['image','mimes:jpeg,jpg,png'],
            'role' => ['required','numeric','between:0,2']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = base64_encode(file_get_contents($data['image']));
        $base = "data:image/png;base64,";

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number'                     => $data['phone_number'],
            'address'                          => $data['address'],
            'gender'                           => $data['gender'],
            'image'                            => $base.$image
            
        ]);
        $role = $data['role'];

        if($role == 0){
            $user->assignRole("instructor");
        }else if($role == 1){
            $user->assignRole("parent");
        }else if($role == 2){
            $user->assignRole("student");
        }
        return $user;
    }

    public function showRegistrationForm($slug)
    {
       
       // dd($slug);
        return view('auth.register', compact('slug'));
    }
}
