<?php

namespace App\Http\Requests;

use Backpack\PermissionManager\app\Http\Requests\UserStoreCrudRequest as storeRequest;

class UserStoreCrudRequest extends storeRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|unique:'.config('permission.table_names.users', 'users').',email',
            'name'     => 'required',
            'image'    => 'nullable |image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address'  => 'required',
            'gender'   => 'required',
            'phone_number'=>'required'
        ];
    }
}
