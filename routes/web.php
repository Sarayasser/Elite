<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Schedule;
use App\Models\Course;
use App\Models\Post;
use App\Instructor;
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

// Courses
Route::get('/courses', function () {return view('courses_list',['courses'=>Course::all()]);})->name('courses.index');
Route::get('/courses/{course}', function () {
    return view('course_details',[
        'course'=>Course::find(request()->course),'courses'=>Course::all(),'posts'=>Post::all()]);})->name('courses.show');

// Posts
Route::get('/courses/{course}/posts', 'PostController@index')->name('posts.index');
Route::get('/courses/{course}/posts/create', 'PostController@create')->name('posts.create');
Route::post('/courses/{course}/posts', 'PostController@store')->name('posts.store');
Route::get('/courses/{course}/posts/{post}', 'PostController@show')->name('posts.show'); 
Route::get('/courses/{course}/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/courses/{course}/posts/{post}', 'PostController@update')->name('posts.update');

//instructor
Route::get('/instructors', 'InstructorController@index')->name('instructors.index');
Route::get('/instructors/{instructor}', 'InstructorController@show')->name('instructors.show');


Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::get('/calender', function () { return view('calender'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/courses-posts', function () { return view('courses_posts'); });
// Route::get('/course', function () { return view('course'); });
Route::get('/event', function () { return view('event'); });
Route::get('/faq', function () { return view('faq'); });
Route::get('/event-details', function () { return view('event_details'); });
Route::get('/timetable', function () { return view('timetable'); });
Route::get('/about', function () { return view('about'); });
Route::get('/users', function () { return view('auth/user'); })->name('users');

// Auth::routes();
Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('/users/register/{slug}','Auth\RegisterController@showRegistrationForm')->name('register')->where("slug","instructor|parent|student");
    Route::post('/users/register', 'Auth\RegisterController@register')->name('post.register');

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

// Email verification
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

});

//home page
Route::get('/', 'HomeController@index')->name('home');

Route::get('/banned',function(){ return view('banned');});