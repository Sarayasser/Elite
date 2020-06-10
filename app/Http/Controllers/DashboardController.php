<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreChildRequest;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = Auth::user();
        if($slug === "instructor"){
            return view('dashboard.instructor.index');
        }
        else if ($slug === "parent"){
            $children = $user->students;
            return view('dashboard.parent.index', ['children' => $children]);
        }else if($slug === "student"){

        }else{
            Redirect::back();
        }
       
        
    }

    public function login($id){
        $user = User::where('id',$id)->first();
        
        Auth::login($user); // login user automatically
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.parent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildRequest $request)
    {
        $parent = Auth::user();
        $base =Null;
        $image =Null;
        if($request->image){
            $image = base64_encode(file_get_contents($request->image));
            $base = "data:image/png;base64,";

        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $parent->phone_number,
            'address' => $parent->address,
            'gender' => $request->gender,
            'image'  => $base.$image,
            'age' => date('Y-m-d H:i:s', strtotime($request->age)),
            'parent_id' => $parent->id
        ]);
        $user->assignRole("student");

        return redirect()->route('dashboard',"parent");
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function progress()
    {
        $user = Auth::user();
        $children = $user->students;
        return view('dashboard.parent.progress', ['children' => $children]);
    }

    
}
