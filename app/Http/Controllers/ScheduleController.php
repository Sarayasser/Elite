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
use App\Events\ScheduleAdded;
use App\Http\Requests\StoreScheduleRequest;

class ScheduleController extends Controller
{

    public function index()
    {
        $user=Auth::user();
        $schedules=Schedule::where('instructor_id',$user->id)->get();
        return view('dashboard.instructor.schedule',['schedules'=>$schedules]);
    }
    public function create(Course $course,Instructor $instructor){
        $courses = Auth::user()->instructor->courses->toarray();
        if(in_array($course->toarray(), $courses)){
            return view('schedules.create',['course' => $course]);
        }else{
            toastr()->error("you are not authorized to view this page");
            return redirect()->back();
        }
            
    }
    public function store(StoreScheduleRequest $request){
        
        $instructor=Instructor::where('user_id',Auth::user()->id)->first();

        $zoom_user=Zoom::user()->find('yakan44444@gmail.com');
        $course=Course::find($request->course_id);
        $topic=$course->name;
        $start_time=request()->start_date."T".request()->time.":00Z";
        

        $meeting=$zoom_user->meetings()->create(['topic'=>$topic, "start_time" => $start_time]);

         $schedule=Schedule::create([
            'start_date'=> $request->start_date,
            'time'=>$request->time,
            'course_id'=>$request->course_id,
            'instructor_id'=>$instructor->id,
            'link'=>$meeting->join_url
         ]);
         $schedule->save();
        
         Notification::create([
             'description'=>'New Schedule created',
             'schedule_id'=>$schedule->id,
             'course_id'=>$request->course_id,
         ]);
         $note = array(
            'message' => 'New Schedule Added Successfully',
            'alert-type' => 'success'
        );
         event(new ScheduleAdded($course->name));
            return redirect()->route('dashboard.schedule','instructor')->with($note);
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
