<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;
use App\User;
use App\Review;
use willvincent\Rateable\Rating;
use App\Http\Controllers\HomeController;

class CourseController extends Controller
{
    public function index()
    {   $test = (new HomeController)->note();
        return view('courses_list',['courses'=>Course::all(),'test'=>$test]);
    }

    public function show(Course $course)
    {   $test = (new HomeController)->note();
        $courses = Course::all();
        $posts = Post::all();
        $reviews=Review::all();
        $course_id=$course->id;

        return view('course_details',[
            'course'=>$course,'courses'=>$courses,'posts'=> $posts, 'reviews'=>$reviews,
            'course_id'=>$course_id,'test'=>$test]);
    }

    public function enroll(Course $course){
        $test = (new HomeController)->note();
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

    public function addReview() {

        $this->validate(request(), [
            'message' => 'required|profanity|max:140'
        ]);
        $review = new Review();

        $review->message = request()->get('message');

        $review->user_id =  request()->get('user_id');

        $review->course_id =  request()->get('course_id');

        $review->user()->associate(auth()->user());

        $review->save();
        return redirect()->back();
}

}
