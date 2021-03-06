<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Instructor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Socialite;
use Exception;
use Session;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Auth\Events\Registered;


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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       // dd($data);
        $dt = new Carbon();
        $after = $dt->subYears(10)->format('d/m/Y');
        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric',"regex:/(01)[0-9]{9}/"],
            'address' => ['required', 'string', 'max:255'],
            'gender'=> ['required'],
            'image' => ['image','mimes:jpeg,jpg,png'],
            'role' => ['required','numeric','between:0,2'],
            'age' => ['required_if:role,2','nullable','date_format:"d/m/Y"','before_or_equal:'.$after],
            'cv' => ['required_if:role,0','nullable','mimes:pdf'],
        );

        $messages = array(
            'age.required_if' => "the birthdate is required",
            'age.before_or_equal' => "your age must be greater than 10",
            'age.date_format' => "the birthdate format is not correct",
            'cv.required_if' => "The cv is required",
            'cv.mimes' => "The cv must be a pdf file."
        );

        return Validator::make($data,$rules,$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $base =Null;
        $image =Null;
        if(array_key_exists ('image',$data)){
            $image = base64_encode(file_get_contents($data['image']));
            $base = "data:image/png;base64,";
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'age' => date('Y-m-d H:i:s', strtotime($data['age'])),

        ]);

        if($image){
            $user->image = $base.$image;
            $user->save();
        }
        $role = $data['role'];

        if($role == 0){
            $user->assignRole("instructor");
            Instructor::create([
                "cv" => $data['cv'],
                "user_id" => $user->id
            ]);
            $user->is_banned = 1;
            $user->save();

        }else if($role == 1){
            $user->assignRole("parent");
        }else if($role == 2){
            $user->assignRole("student");
        }
        return $user;
    }

    public function showRegistrationForm($slug)
    {
        return view('auth.register', compact('slug'));
    }

        /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all())));
        if($user->is_banned == 1){
            return redirect()->route('login')
                ->withError('wait for admin acceptance');
        }else{
            $this->guard()->login($user);
        }
       

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());
    }


    public function redirectToProvider($slug,$driver)
    {
        Session::put('slug', $slug);
        Session::save();
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback(){

            $user = Socialite::driver(request()->provider)->stateless()->user();
            $existingUser = User::where('email', $user->email)->first();

            if($existingUser){
                auth()->login($existingUser, true);
                if(!$existingUser->email_verified_at)
                    $existingUser->sendEmailVerificationNotification();
            } else {
                if (Session::get('slug')){
                    $newUser                  = new User;
                    $newUser->name            = $user->name;
                    $newUser->email           = $user->email;
                    $newUser->provider_id     = $user->id;
                    $newUser->password        = Hash::make($this->password_generate(8));
                    $newUser->address         = 'Alexandria';
                    $newUser->phone_number    = '00000000';
                    $role=Session::get('slug');
                    $newUser->save();

                    if($role == 'instructor'){
                        $newUser->assignRole("instructor");
                        Instructor::create([
                        // "cv" => 'dhjshkjhsd',
                            "user_id" => $newUser->id
                        ]);
                    }else if($role == 'parent'){
                        $newUser->assignRole("parent");
                    }else if($role == 'student'){
                        $newUser->assignRole("student");
                    }
                    if(!$newUser->email_verified_at)
                        $newUser->sendEmailVerificationNotification();
                    auth()->login($newUser, true);
                }else{
                    return redirect()->to('/users');
                }

            }

        return redirect()->to('/');
    }
    public function password_generate($chars)
    {
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($data), 0, $chars);
    }
}
