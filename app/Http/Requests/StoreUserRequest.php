<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find(request()->user);
        // dd($user);        
        return [
        'name'=>['required','min:3',$user ? Rule::unique('users')->ignore($user->id) : 'unique:users'],
        'email'=>['required',$user ? Rule::unique('users')->ignore($user->id) : 'unique:users'],
        'password' => 'required|confirmed|min:6',
        ];
    }
}
