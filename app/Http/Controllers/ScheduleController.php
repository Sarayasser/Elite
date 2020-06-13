<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Http\Controllers\HomeController;
use App\Models\Course;
use App\Instructor;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom; 

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
<<<<<<< HEAD
        $schedule=Schedule::create([
=======

        $zoom_user=Zoom::user()->find('yakan44444@gmail.com');
        $course=Course::find($request->course_id);
        $topic=$course->name;
        $start_time=request()->start_date."T".request()->time.":00Z";
        // "start_time" => "2020-05-09T14:00:00+00:00"
        // "2020-12-31" "12:59"
        // "start_time" => "2020-06-11T18:00:00Z"

        $meeting=$zoom_user->meetings()->create(['topic'=>$topic, "start_time" => $start_time]);
        
         Schedule::create([
>>>>>>> a565b6cadbc32c8fb6f6771209a3d04868fb0cb6
            'start_date'=> $request->start_date,
            'end_date'=>$request->end_date,
            'time'=>$request->time,
            'course_id'=>$request->course_id,
            'instructor_id'=>$instructor->id,
<<<<<<< HEAD
            'link'=>$request->link
         ]);
         $schedule->save();
        //  dd($schedule->id);
=======
            'link'=>$meeting->join_url
         ])->save();

>>>>>>> a565b6cadbc32c8fb6f6771209a3d04868fb0cb6
         Notification::create([
             'description'=>'New Schedule created',
             'schedule_id'=>$schedule->id,
             'course_id'=>$request->course_id,
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
