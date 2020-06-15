<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;
use App\Notification;
use App\Http\Controllers\HomeController;
use App\Events\EventAdded;
use App\Instructor;

class EventController extends Controller
{
    public function index(){
        $test = (new HomeController)->note();
        $events=Event::all();
        // dd($events);
        return view('event',['events'=>$events,'test'=>$test]);
    }
    public function show(Request $request, Event $event){
        $test = (new HomeController)->note();
        // dd($event->user);
        return view('event_details',['event'=>$event,'test'=>$test]);
    }
    public function create(){
        $test = (new HomeController)->note();
        return view('events.create',['test'=>$test]);
    }
    public function store(StoreEventRequest $request){
        $test = (new HomeController)->note();
        // $request=Request();
        $event = Event::create([
            'name' => $request->name,
            'description' =>  $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            // 'image' => $request->file('image'),
            ]);
            if($request->hasfile('image')){
                // dd($request->file('image'));
            $event->image = $request->file('image');
        }else{
            // $filename='/storage/events/12345.jpg';
            // $event->image= $filename;
        }
        $event->save();
        $instructor=Instructor::where('user_id',Auth::user()->id)->first();
        Notification::create([
            'description'=> 'New Event created',
            'event_id' => $event->id,
            'instructor_id' => $instructor->id,
        ]);
        event(new EventAdded('Check it Out'));
        $note = array(
            'message' => 'New Event Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('/event')->with($note);
    }
    public function edit(Event $event){
        $test = (new HomeController)->note();
        $events = Event::where('user_id',Auth::user()->id)->get()->toarray();
        if(in_array($event->toarray(), $events)){
            return view('events.edit',['event'=>$event ,'test'=>$test]);
        }
        else{
            toastr()->error("you are not authorized to view this page");
            return redirect('/event');
        }
        
    }
    public function update(StoreEventRequest $request, Event $event){
        $event->update([
            'name' => $request->name,
            'description' =>  $request->description,
            'location' => $request->location,
            'date' => $request->date,
        ]);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$event->image);
            // dd($event->image);
            $event->image = $request->file('image');
            $event->save();
        }
        return redirect('/event');
    }
    public function destroy(Event $event){
        $events = Event::where('user_id',Auth::user()->id)->get()->toarray();
        if(in_array($event->toarray(), $events)){
            $event->delete();
            toastr()->success("Event deleted succesfully");
            return redirect('/event');
        }
        else{
            toastr()->error("you are not authorized to delete this event");
            return redirect('/event');
        }
        
       
    }

    public function attend(Event $event)
    {
        $user = auth()->user();
        if($user->hasRole('student')){
            $user->events()->attach($event);
        }
        return response()->json(['attended' => 'attended']);
    }
}
