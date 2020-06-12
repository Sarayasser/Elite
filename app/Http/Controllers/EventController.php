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

class EventController extends Controller
{
    public function index(){
        $test = (new HomeController)->note();
        $events=Event::all();
        // dd($events);
        return view('event',['events'=>$events,'test'=>$test]);
    }
    public function show(){
        $test = (new HomeController)->note();
        $request = Request();
        $id= $request->event;
        $event = Event::where('id',$id)->first();
        // dd($event);
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
        Notification::create([
            'description'=> 'New Event created',
            'event_id' => $event->id,
            'instructor_id' => $event->instructor_id,
        ]);
        return redirect('/event');
    }
    public function edit(){
        $test = (new HomeController)->note();
        $request=Request();
        $id=$request->event;
        $event=Event::where('id',$id)->first();
        $files = Storage::disk('local')->get('countries.json');
        $countries=array();
        for($i=0;$i<250;$i++){
        array_push($countries,json_decode($files, true)[$i]['name'].','.json_decode($files, true)[$i]['capital']);
        }
        // dd($event);
        return view('events.edit',['event'=>$event , 'countries'=>$countries,'test'=>$test]);
    }
    public function update(StoreEventRequest $request){
        $id=$request->event;
        $eve=Event::where('id',$id)->first();
        Event::where('id',$id)->update([
            'name' => $request->name,
            'description' =>  $request->description,
            'location' => $request->location,
            'date' => $request->date,
        ]);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$eve->image);
            // dd($event->image);
            $eve->image = $request->file('image');
            $eve->save();
        }
        return redirect('/event');
    }
    public function destroy(){
        $request=Request();
        $id=$request->event;
        Event::where('id',$id)->delete();
        return redirect('/event');
    }
}
