<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();

        return [
        'name'=>['required','string','min:3'],
        'email'=>['required',$user ? Rule::unique('users')->ignore($user->id) : 'unique:users'],
        'phone_number' => ['required', 'numeric',"regex:/(01)[0-9]{9}/"],
        'address' => ['required', 'string', 'max:255'],
        'gender'=> ['required'],
        'image' => ['image','mimes:jpeg,jpg,png'],
        ];
    }
}
