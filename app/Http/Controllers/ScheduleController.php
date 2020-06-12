<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Http\Controllers\HomeController;


class ScheduleController extends Controller
{

    public function index()
    {
        $schedules=Schedule::all();
        return view('schedule.index',['schedules'=>$schedules]);
    }
    public function create(){
        $courses=Course::all();
        return view('schedule.create',['courses'=>$courses]);
    }
    public function store(){

    }
    public function destroy(){

    }
}
