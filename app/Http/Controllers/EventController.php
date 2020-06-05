<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        $events=Event::all();
        return view('event',['events'=>$events]);
    }
    public function show(){
        $request = Request();
        $id= $request->event;
        $event = Event::where('id',$id)->first();
        return view('event_details',['event'=>$event]);
    }
    public function create(){
        return view('events.create');
    }
    public function store(){
        $request=Request();
        $event = Event::create([
            'name' => $request->name,
            'description' =>  $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            // 'image' => $request->file('image'),
            ]);
        $event->image = $request->file('image');
        $event->save();
        return redirect('/event');
    }
    public function edit(){
        $request=Request();
        $id=$request->event;
        $event=Event::where('id',$id)->first();
        return view('events.edit',['event'=>$event]);
    }
    public function update(){

    }
    public function destroy(){
        $request=Request();
        $id=$request->event;
        Event::where('id',$id)->delete();
        return redirect('/event');
    }
}
