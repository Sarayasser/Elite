<?php

use Illuminate\Database\Seeder;
use App\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@example.com', 
            'password' => bcrypt('password'), 
            'is_admin' => 1,
            'address' => 'Alexandria',
            'phone_number' => '012686454686',
            'gender' => 0
            ]);
    }
}
