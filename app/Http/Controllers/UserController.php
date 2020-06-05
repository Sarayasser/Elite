<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function show(){
        $request=Request();
        $id=$request->user;
        $user=User::where('id',$id)->first();
        return view('users.profile',['user'=>$user]);
    }
    public function edit(){
        $request=Request();
        $id=$request->user;
        $user=User::where('id',$id)->first();
        return view('users.edit',['user'=>$user]);
    }
    public function update(){

    }
}
