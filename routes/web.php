<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () { return view('home'); });
Route::get('/calender', function () { return view('calender'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/courses', function () { return view('courses_list'); });
Route::get('/course-details', function () { return view('course_details'); });
Route::get('/courses-posts', function () { return view('courses_posts'); });
Route::get('/course', function () { return view('course'); });
Route::get('/teachers', function () { return view('teachers'); });
Route::get('/teacher-details', function () { return view('teacher_details'); });
Route::get('/event', function () { return view('event'); });
Route::get('/faq', function () { return view('faq'); });
Route::get('/event-details', function () { return view('event_details'); });
Route::get('/timetable', function () { return view('timetable'); });
Route::get('/about', function () { return view('about'); });
Route::get('/users', function () { return view('user'); })->name('users');

// Auth::routes();

Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('/users/register/{slug}','Auth\RegisterController@showRegistrationForm')->name('register')->where("slug","instructor|parent|student");
    Route::post('/users/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/home', 'HomeController@index')->name('home');
