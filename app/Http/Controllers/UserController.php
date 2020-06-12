<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Gamify\Badges;
use App\Http\Controllers\HomeController;

class UserController extends Controller
{
    public function show(){
        $test = (new HomeController)->note();
        // $request=Request();
        // $id=$request->user;
        // $user=User::where('id',$id)->first();
        $user = Auth::user();
        $badges=$user->Badges;
        return view('users.profile',['user'=>$user, 'badges'=>$badges,'test'=>$test]);
    }
    public function edit(){
        // $request=Request();
        // $id=$request->user;
        // $user=User::where('id',$id)->first();
        $test = (new HomeController)->note();
        $user = Auth::user();
        $files = Storage::disk('local')->get('countries.json');
        $countries=array();
        for($i=0;$i<250;$i++){
        array_push($countries,json_decode($files, true)[$i]['name'].','.json_decode($files, true)[$i]['capital']);
        }
        return view('users.edit',['user'=>$user,'countries'=>$countries,'test'=>$test]);
    }
    public function update(StoreUserRequest $request){
        // $request=Request();
        // dd($request);
        $test = (new HomeController)->note();
        $id=$request->user;
        $user=User::where('id',$id)->first();

        User::where('id',$id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'age' => $request->age,
            'password' => Hash::make($request->password),
            'phone_number' =>$request->phone_number,
        ]);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$user->image);
            $user->image = $request->file('image');
            // dd($user->image);
            $user->save();
        }
        return redirect('/profile/'.$id);
    }
}
