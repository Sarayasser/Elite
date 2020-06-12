<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;
use willvincent\Rateable\Rating;
use App\Http\Controllers\HomeController;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::with('user')->get();
        return view('instructors.index',['instructors' => $instructors]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructors  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        $instructor = Instructor::with('user')->findOrFail($instructor->id);
        return view('instructors.show', ['instructor' => $instructor]);
    }

    public function rateInstructor()
    {
        $instructor = Instructor::find(request()->id);
        $rating = $instructor->ratings()->where('user_id', auth()->user()->id)->first();
        if(is_null($rating) ){
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $instructor->ratings()->save($rating);
            return redirect()->back();
        }

        if( $rating->rating<=5){

            $instructor->ratings()->where('user_id', auth()->user()->id)->first()->delete($rating);
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $instructor->ratings()->save($rating);
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
