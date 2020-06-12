<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreChildRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Event;
use App\Instructor;

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
        if($slug === "instructor" && $user->hasRole('instructor')){
            // dd($user->id);
            $instructor=Instructor::where('user_id',$user->id)->first();
            $courses=Course::where('instructor_id',$instructor->id)->get();
            // dd($courses);
            return view('dashboard.instructor.index',['courses'=>$courses]);
        }
        else if ($slug === "parent" && $user->hasRole('parent')){
            $children = $user->students;
            return view('dashboard.parent.index', ['children' => $children]);
        }else if($slug === "student" && $user->hasRole('student')){

        }else{
            return redirect()->back()->with('error', "you are not authenticated in this route");
        }

    }

    public function login($id){

        $user = Auth::user();
        $children = $user->students;
        if($children->contains('id',$id)){
            $user = User::where('id',$id)->first();
            Auth::login($user);
            return redirect('/');
        }{
            return redirect()->back()->with('error', "you don't have child with this account");
        }

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
        $user->sendEmailVerificationNotification();

        return redirect()->route('dashboard',"parent")->with('status', "you created account for your child successfully .. wait for verification email");;
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

    public function students_enrolled(){
        $id=Auth::user()->id;
        $instructor=Instructor::where('user_id',$id)->first();
        $course=Course::where('instructor_id',$instructor->id)->get();
        $test=array();
        for($x=0;$x<sizeof($course);$x++){
            if(!$course[$x]->students()->get()->isEmpty()){
        array_push($test,...$course[$x]->students()->get()->pluck('id')->toArray());
            }
        }
        $tes=User::whereIn('id',array_unique($test))->get();
        // dd($tes);
        return view('dashboard.dashboard_students',['students'=>$tes]);
    }

    public function instructor_events(){
        $id=Auth::user()->id;
        $instructor=Instructor::where('user_id',$id)->first();
        $events=Event::where('user_id',$instructor->user_id)->get();
        return view('dashboard.dashboard_events',['events'=>$events]);
    }
    public function Instructor_schedule(){
        $id=Auth::user()->id;
        $schedules=Schedule::where('instructor_id',$id)->get();
    }

}
