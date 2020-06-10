<?php

namespace App\Http\Requests;

use Backpack\PermissionManager\app\Http\Requests\UserUpdateCrudRequest as storeRequest;

class UserUpdateCrudRequest extends storeRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userModel = config('backpack.permissionmanager.models.user');
        $userModel = new $userModel();
        $routeSegmentWithId = empty(config('backpack.base.route_prefix')) ? '2' : '3';

        $userId = $this->get('id') ?? \Request::instance()->segment($routeSegmentWithId);

        if (!$userModel->find($userId)) {
            abort(400, 'Could not find that entry in the database.');
        }

        return [
            'email'    => 'required|unique:'.config('permission.table_names.users', 'users').',email,'.$userId,
            'name'     => 'required',
            'image'    => 'nullable |image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address'  => 'required',
            'gender'   => 'required',
            'phone_number'=>'required'
        ];
    }
}
