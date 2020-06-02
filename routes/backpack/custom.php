<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin\Auth',
    'middleware' => config('backpack.base.web_middleware', 'web'),
    'prefix'     => 'admin',
], function () {
    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('backpack.auth.register');
    Route::post('register', 'RegisterController@register');
    // Login Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('backpack.auth.login');
    Route::post('login', 'LoginController@login');

});

Route::match(['get', 'post'], '/admin/login', function(){
    return redirect('/users/login');
});
Route::match(['get', 'post'], '/admin/register', function(){
    return redirect('/users/register');
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('tag', 'TagCrudController');
    Route::crud('user', 'UserCrudController');
    
    Route::crud('post', 'PostCrudController');
    Route::crud('course', 'CourseCrudController');
    Route::crud('event', 'EventCrudController');
    Route::crud('schedule', 'ScheduleCrudController');
    
    Route::get('user/{id}', 'UserCrudController@moderate');
    Route::post('user/{id}', 'UserCrudController@moderate');
}); // this should be the absolute last line of this file

