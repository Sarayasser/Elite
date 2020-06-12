<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Http\Controllers\HomeController;
use App\Models\Course;
use App\Instructor;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{

    public function index()
    {
        $user=Auth::user();
        $schedules=Schedule::where('instructor_id',$user->id)->get();
        return view('dashboard.instructor.schedule',['schedules'=>$schedules]);
    }
    public function create(Course $course,Instructor $instructor){
        return view('schedules.create',['course' => $course]);
    }
    public function store(){
         $request=Request();
        //  dd($request->course_id);
        $instructor=Instructor::where('user_id',Auth::user()->id)->first();
         Schedule::create([
            'start_date'=> $request->start_date,
            'end_date'=>$request->end_date,
            'time'=>$request->time,
            'course_id'=>$request->course_id,
            'instructor_id'=>$instructor->id,
            'link'=>$request->link
         ])->save();

         Notification::create([
             'description'=>'New Schedule created',
             'schedule_id'=>$request->id,
             'course_id'=>$request->course_id,
             'instructor_id'=>$instructor->id,
         ]);
            return redirect()->route('dashboard.schedule','instructor');
    }

    public function edit(){

    }
    public function update(){

    }
    public function destroy(){
        $request=request();
        $id=$request->schedule;
        Schedule::where('id',$id)->delete();
        return redirect()->route('dashboard.schedule','instructor');
    }
}
