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
    public function index(){
        $test = (new HomeController)->note();
        return view('users.profile',['test'=>$test]);
    }

    public function update(StoreUserRequest $request){

        $test = (new HomeController)->note();
        $id=$request->user;
        $user=User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'age' => $request->age,
        ]);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$user->image);
            $user->image = $request->file('image');
            $user->save();
        }
        return redirect('/profile')->with('status', 'Profile updated!');
    }
}
