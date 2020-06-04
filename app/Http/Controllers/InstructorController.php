<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;

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
}
