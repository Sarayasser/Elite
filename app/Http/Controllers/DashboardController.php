<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Course;
use App\Models\Event;
use App\Instructor;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = Auth::user();
        if($slug === "instructor"){
            // dd($user->id);
            $instructor=Instructor::where('user_id',$user->id)->first();
            $courses=Course::where('instructor_id',$instructor->id)->get();
            // dd($courses);
            return view('dashboard.instructor.index',['courses'=>$courses]);
        }
        else if ($slug === "parent"){
            $children = User::with('parent')->where('parent_id','=',$user->id)->get();
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

    public function students_enrolled(){

    }
    public function instructor_events(){
        $id=Auth::user()->id;
        $instructor=Instructor::where('user_id',$id)->first();
        $events=Event::where('user_id',$instructor->id)->get();
        // dd($events);
        return view('dashboard.dashboard_events',['events'=>$events]);
    }
    
}
