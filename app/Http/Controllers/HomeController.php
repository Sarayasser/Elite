<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user=Auth::user();
        if(Auth::user()){
        if($user->hasRole('student')){
            $post=$this->note();
        // dd($post);
        return view('home',['courses'=>Course::all(),'test'=>$post]);
        }else{
            return view('home',['courses'=>Course::all()]);
        }}else{
            return view('home',['courses'=>Course::all()]);
        }
    }
    public function note(){
        $user=Auth::user();
        $student=User::where('id',$user->id)->first();
        $events=Notification::where('event_id','!=',null)->get();
        $course=$student->courses()->get()->pluck('id');
        $notification=Notification::whereIn('course_id',$course)->get();
        // dd($notification);
        $instructor=$student->courses()->get()->pluck('instructor_id');
        $post=Notification::orderBy('created_at')->whereIn('course_id',$course)->orWhereIn('instructor_id',$instructor)->take(5)->get();
        $event=$events->where('instructor_id',$instructor);

        return $post;
    }
}
