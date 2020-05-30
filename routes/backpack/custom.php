<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',
    'middleware' => config('backpack.base.web_middleware', 'web'),
    'prefix'     => config('backpack.base.route_prefix'),
], function () {
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('backpack.auth.register');
    Route::post('register', 'Auth\RegisterController@register');

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
}); // this should be the absolute last line of this file