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
Route::get('/banned',function(){ return view('banned');});
