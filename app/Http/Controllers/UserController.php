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
use App\InstructorExperience;
use App\Instructor;


class UserController extends Controller
{
    public function index(){

        $test = (new HomeController)->note();

        if(Auth::user()->hasRole('instructor')){
            $exps = Auth::user()->instructor->experiences->toarray();
            $years = Instructor::getYears();
            return view('users.profile',['years'=>$years,'exps'=>$exps,'test'=>$test]);

        }
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
       
        if($user->hasRole('instructor')){
            
            $instructor = $user->instructor;
           
            $instructor->update([
                'instructor_id' => $user->id,
                'facebook' => $request->facebook,
                'github' => $request->github,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'title' => $request->title,
                'year_of_experience' => $request->year_of_experience,
            ]);
            
            if ($request->hasFile('cv') ){
                Storage::delete('public/'.$instructor->cv); 
                $instructor->cv = $request->file('cv');
                $instructor->save();
            }

            if($request->experiences){
                InstructorExperience::whereNotIn('experience', $request->experiences)->delete();
                foreach($request->experiences as $exp){
                    $instExp =  new InstructorExperience();
                    $instExp->instructor_id = $user->instructor->id; 
                    $instExp->experience = $exp; 
                    $instExp->save();
                }
            }else{
                InstructorExperience::where('instructor_id', $instructor->id)->delete();
            }
           
        }
       
        return redirect('/profile')->with('status', 'Profile updated!');
    }

    public function getCV(){
           
        return view('users.cv');
    }
}
