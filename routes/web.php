<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Course;
use App\Models\Course;
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

Route::get('/courses', function () {
    $courses=Course::all();
    // return view('welcome');
    return view('courses_list',[
        'courses'=>$courses
    ]);
    
});
// public function index(){
        
//     $courses=Course::all();
    // return view('courses.index',[
    //     'courses'=>$courses
    // ]);
// }

// Posts
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/create', 'PostController@create')->name('posts.create');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::get('/', function () { return view('home'); });
Route::get('/calender', function () { return view('calender'); });
Route::get('/contact', function () { return view('contact'); });
// Route::get('/courses', function () { return view('courses_list'); });
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
Route::get('/banned',function(){ return view('banned');});
// Route::get('/courses', 'CourseCrudController@index')->name('courses.index');
// Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
// Route::group([], function(){
//     // Route::get('/courses', 'CourseCrudController@index');
//     Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
//         Route::get('/courses', 'CourseCrudController@index');
        // Route::get('/users', 'UserController@index');
        // Route::get('/user/add', 'UserController@getAdd');
        // Route::post('/user/add', 'UserController@postAdd');
        // Route::get('/user/edit/{id}', 'UserController@getEdit');
        // Route::post('/user/edit/{id}', 'UserController@postEdit');
        // Route::get('/user/delete/{id}', 'UserController@delete');
    // });

