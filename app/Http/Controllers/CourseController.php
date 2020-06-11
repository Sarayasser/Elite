<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;
use App\User;
use willvincent\Rateable\Rating;

class CourseController extends Controller
{
    public function index()
    {    
        return view('courses_list',['courses'=>Course::all()]);
    }

    public function show()
    {    
        $course = Course::find(request()->course);
        $courses = Course::all();
        $posts = Post::all();
        return view('course_details',['course'=>$course,'courses'=>$courses,'posts'=> $posts]);
    }

    public function enroll(Course $course){
        $user = auth()->user();
        if($user->hasRole('student'))
            if ($course->capacity > 0) {
                $user->courses()->attach($course);
                $course->capacity --;
                $course->save();
            }
        if(request()->ajax()) // This is check ajax request
            return response()->json(['enrolled' => 'enrolled']);
        else
            return redirect()->route('courses.show', $course->id);
    }

    public function rateCourse()
    {
        $course = Course::find(request()->id);
        $rating = $course->ratings()->where('user_id', auth()->user()->id)->first();

        if(is_null($rating) ){
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $course->ratings()->save($rating);
            return redirect()->back();
        }

        if( $rating->rating<=5){
            $course->ratings()->where('user_id', auth()->user()->id)->first()->delete($rating);
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $course->ratings()->save($rating);
            return redirect()->back();
        }

        if( $rating->rating==null){     
            return redirect()->back()->with("invalid rating");
        }
        else{
            return redirect()->back()->with("You already made a review");
        }
    }

}
