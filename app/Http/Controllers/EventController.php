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
        return view('event_details',['event'=>$event,'test'=>$test]);
    }
    public function create(){
        $test = (new HomeController)->note();
        // $files =file_get_contents(Storage::files('/public/countries')[0]);
        $files = Storage::disk('json')->get('countries.json');
        $countries=array();
        for($i=0;$i<250;$i++){
        array_push($countries,json_decode($files, true)[$i]['name'].','.json_decode($files, true)[$i]['capital']);
        }
        // dd($countries);
        return view('events.create',['countries'=>$countries,'test'=>$test]);
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
        $files = Storage::disk('local')->get('countries.json');
        $countries=array();
        for($i=0;$i<250;$i++){
        array_push($countries,json_decode($files, true)[$i]['name'].','.json_decode($files, true)[$i]['capital']);
        }
        // dd($event);
        return view('events.edit',['event'=>$event , 'countries'=>$countries,'test'=>$test]);
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
        $event->delete();
        return redirect('/event');
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
