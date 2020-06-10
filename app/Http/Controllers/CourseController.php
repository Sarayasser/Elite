<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;
use App\User;
use willvincent\Rateable\Rating;

class CourseController extends Controller
{
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
        else{
            return redirect()->back()->with("You already made a review");
        }


            }

}
