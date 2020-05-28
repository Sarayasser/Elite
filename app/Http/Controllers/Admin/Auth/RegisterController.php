<?php
namespace App\Http\Controllers\Admin\Auth;

use Backpack\CRUD\app\Http\Controllers\Auth\RegisterController as BackpackRegisterController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\User;

class RegisterController extends BackpackRegisterController 
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
        $users_table = $user->getTable();
        $email_validation = backpack_authentication_column() == 'email' ? 'email|' : '';

        return Validator::make($data, [
            'name'                             => 'required|max:255',
            backpack_authentication_column()   => 'required|'.$email_validation.'max:255|unique:'.$users_table,
            'password'                         => 'required|min:6|confirmed',
            'phone_number'                     => 'required|numeric|regex:/(01)[0-9]{9}/',
            'address'                          => 'required|string|max:255',
            'gender'                           => 'required', 
            'image'                            => 'image|mimes:jpeg,jpg,png',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();

        // $path = NULL;
        // if (array_key_exists('image',$data)) {
        //     $path = Storage::disk('public')->put('users_avatars', $data['image']);
        // }
        
        $image = base64_encode(file_get_contents($data['image']));
        $base = "data:image/png;base64,";
        
        return $user->create([
            'name'                             => $data['name'],
            backpack_authentication_column()   => $data[backpack_authentication_column()],
            'password'                         => bcrypt($data['password']),
            'phone_number'                     => $data['phone_number'],
            'address'                          => $data['address'],
            'gender'                           => $data['gender'],
            'image'                            => $base.$image
        ]);
    }
}