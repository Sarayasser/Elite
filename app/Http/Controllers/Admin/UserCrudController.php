<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as UserController;
use App\Http\Requests\UserStoreCrudRequest as StoreRequest;
use App\Http\Requests\UserUpdateCrudRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Backpack\PermissionManager\app\Models\Role;
use App\Instructor;

class UserCrudController extends UserController
{

    public function setup()
    {
        $this->crud->setModel('App\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('user', 'users');
    }
    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
           
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name' => 'is_banned',
                'label' => 'Status',
                'type' => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "Active",
                    1 => "InActive"
                ],
            ],
            [
                'label'        => "Profile Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => true, // set to true to allow cropping, false to disable
                'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
                // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
                // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
            ],
            [
                'name' => 'cv',
                'label' => 'cv',
                'type' => 'browse',
            ],
            [ // n-n relationship (with pivot table)
                'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'roles', // the method that defines the relationship in your Model
                'entity'    => 'roles', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('permission.models.role'), // foreign key model
            ],
            [   // date_picker
                'name' => 'age',
                'type' => 'date_picker',
                'label' => 'Birthdate',

            ],
            [
                'name'  => 'address',
                'label' => trans('address'),
                'type'  => 'address',
            ],
            [   
                'name'        => 'gender', // the name of the db column
                'label'       => 'gender', // the input label
                'type'        => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "male",
                    1 => "female"
                ],
            ],    
            [
                'name'  => 'phone_number',
                'label' => trans('phone_number'),
                'type'  => 'text',
            ],

        ]);
        // Role Filter
        $this->crud->addFilter(
            [
                'name'  => 'role',
                'type'  => 'dropdown',
                'label' => trans('backpack::permissionmanager.role'),
            ],
            config('permission.models.role')::all()->pluck('name', 'id')->toArray(),
            function ($value) { // if the filter is active
                $this->crud->addClause('whereHas', 'roles', function ($query) use ($value) {
                    $query->where('role_id', '=', $value);
                });
            }
        );

        // Extra Permission Filter
        $this->crud->addFilter(
            [
                'name'  => 'permissions',
                'type'  => 'select2',
                'label' => trans('backpack::permissionmanager.extra_permissions'),
            ],
            config('permission.models.permission')::all()->pluck('name', 'id')->toArray(),
            function ($value) { // if the filter is active
                $this->crud->addClause('whereHas', 'permissions', function ($query) use ($value) {
                    $query->where('permission_id', '=', $value);
                });
            }
        );

        $this->crud->addButtonFromView('line', 'moderate', 'moderate', 'beginning');

    }
    public function setupShowOperation(){
        $this->crud->addColumns([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [ // n-n relationship (with pivot table)
                'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'roles', // the method that defines the relationship in your Model
                'entity'    => 'roles', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('permission.models.role'), // foreign key model
            ],
            [
                'label'        => "Profile Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => true, // set to true to allow cropping, false to disable
                'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
                // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
                // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
            ],
            [
                'name'  => 'address',
                'label' => trans('address'),
                'type'  => 'address',
            ],
            [   
                'name'        => 'gender', // the name of the db column
                'label'       => 'gender', // the input label
                'type'        => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "male",
                    1 => "female"
                ],
            ],    
            [
                'name'  => 'phone_number',
                'label' => trans('phone_number'),
                'type'  => 'text',
            ],
            [
                'name' => 'is_banned',
                'label' => 'Status',
                'type' => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "Active",
                    1 => "InActive"
                ],
            ],
            [   // date_picker
                'name' => 'age',
                'type' => 'date_picker',
                'label' => 'Birthdate',
                // optional:
                'date_picker_options' => [
                   'todayBtn' => 'linked',
                   'format' => 'dd-mm-yyyy',
                   'language' => 'en'
                ],
             ],
           
        ]);
        $this->crud->addButtonFromView('line', 'moderate', 'moderate', 'beginning');
    }
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run
        $response = $this->traitStore();
        // do something after save
        $user = $this->crud->entry;
        Instructor::create([
            "user_id" => $user->id
        ]);
        $token = app('auth.password.broker')->createToken($user);
        $user->sendPasswordResetNotification($token);
        return $response;
    }
    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }
    protected function handlePasswordInput($request)
    {
        $request->request->set('password', Hash::make(Str::random(8)));
        return $request;
    }
    protected function addUserFields()
    {

        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name'  => 'address',
                'label' => trans('address'),
                'type'  => 'address',
            ],
            [   
                'name'        => 'gender', // the name of the db column
                'label'       => 'gender', // the input label
                'type'        => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "male",
                    1 => "female"
                ],
            ],
            [   // Hidden
                'name'  => 'password',
                'type'  => 'hidden',
            ], 
            [
                'name'  => 'phone_number',
                'label' => trans('phone_number'),
                'type'  => 'text',
            ],
            [ 
                'label' => trans('backpack::permissionmanager.roles'),
                'type' => 'select_multiple',
                'name' => 'roles',
                'entity' => 'roles',
                'attribute' => 'name',
                'model' => "Backpack\PermissionManager\app\Models\Role",
                'models' => config('permission.models.role'),
                'options'   => (function ($query) {
                    return $query->whereNotIN('id', [1])->get();
                }),

            ],
            [   // date_picker
                'name' => 'age',
                'type' => 'date_picker',
                'label' => 'Birthdate',
                // optional:
                'date_picker_options' => [
                   'todayBtn' => 'linked',
                   'format' => 'dd-mm-yyyy',
                   'language' => 'en'
                ],
            ]
           
         
        ]);
    }


    public function setupCreateOperation()
    {
        $this->addUserFields();
        $this->crud->setValidation(StoreRequest::class);
    }
    public function setupUpdateOperation()
    {
        $this->addUserFields();
        $this->crud->setValidation(UpdateRequest::class);
    }
 
    public function moderate() 
    {   
        $request=Request();
        $id = $request->id;
        $person =User::where('id',$id)->first();
        if(User::where('id',$id)->first()->is_banned){
            $user=User::where('id',$id)->first()->update(['is_banned' => 0]);
            if(!$person->email_verified_at){
                $person->sendEmailVerificationNotification();
            }
            $user=User::where('id',$id)->first();
            return redirect('/admin/user');
        }else{
            $user=User::where('id',$id)->first()->update(['is_banned' => 1]);
            $users=User::where('id',$id)->first();
            return redirect('/admin/user');
        }
    }
}