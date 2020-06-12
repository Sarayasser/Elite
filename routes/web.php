<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Gamify\Points\PostCompleted;

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
Route::group(['middleware' => ['auth', 'checkban']], function() {
// Courses
Route::get('/courses', function () {return view('courses_list',['courses'=>Course::all()]);})->name('courses.index');
Route::get('/courses/{course}', function () {
    return view('course_details',[

        'course'=>Course::find(request()->course),'courses'=>Course::all(),'posts'=>Post::all()]);
})->name('courses.show');

Route::get('/about', function () {
    return view('about', [
        'course'=>Course::find(request()->course),'courses'=>Course::all(),'posts'=>Post::all()]);
     })->name('about');

Route::post('/courses/{course}/enroll', function(Course $course){
    $user = auth()->user();
    if($user->hasRole('student'))
        if ($course->capacity > 0) {
            $user->courses()->attach($course);
            $course->capacity --;
            $course->save();
        }
    if(request()->ajax()) // This is check ajax request
        return response()->json(['enrolled' => 'enrolled']);
    else
        return redirect()->route('courses.show', $course->id);

})->name('courses.enroll');


// Posts
Route::get('/courses/{course}/posts', 'PostController@index')->name('posts.index');
Route::get('/courses/{course}/posts/create', 'PostController@create')->name('posts.create');
Route::post('/courses/{course}/posts', 'PostController@store')->name('posts.store');
Route::get('/courses/{course}/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/courses/{course}/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/courses/{course}/posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/courses/{course}/posts/{post}', 'PostController@destroy')->name('posts.destroy');

Route::post('/courses/{course}/posts/{post}', function($course_id, Post $post){
    auth()->user()->readPosts()->attach($post->id);
    givePoint(new PostCompleted($post));
    return response()->json(['ok' => 'ok']);
})->name('posts.read');


// Events
Route::get('/event/create', 'EventController@create')->name('events.create');
Route::post('/event','EventController@store')->name('events.store');
Route::get('/event/{event}','EventController@show')->name('events.show');
Route::get('/event/{event}/edit','EventController@edit')->name('events.edit');
Route::put('/event/{event}','EventController@update')->name('events.update');
Route::get('/event/delete/{event}','EventController@destroy')->name('events.destroy');
Route::get('/event','EventController@index')->name('events.index');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
//instructor
Route::get('/instructors', 'InstructorController@index')->name('instructors.index');
Route::get('/instructors/{instructor}', 'InstructorController@show')->name('instructors.show');


Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

//Profile
Route::get('/profile/{user}','UserController@show')->name('user.show');
Route::get('/profile/{user}/edit','UserController@edit')->name('user.edit');
Route::put('/profile/{user}','UserController@update')->name('user.update');


Route::get('/calender', function () { return view('calender'); });
Route::get('/courses-posts', function () { return view('courses_posts'); });
// Route::get('/course', function () { return view('course'); });
Route::get('/teachers', function () { return view('teachers'); });
Route::get('/teacher-details', function () { return view('teacher_details'); });
// Route::get('/event', function () { return view('event'); });
Route::get('/faq', function () { return view('faq'); });
// Route::get('/event-details', function () { return view('event_details'); });
Route::get('/timetable', function () { return view('timetable'); });
Route::get('/users', function () { return view('auth/user'); })->name('users');

//Dashboard

Route::get('/dashboard/{slug}','DashboardController@index')->name('dashboard');
Route::get('/dashboard/{slug}/students','DashboardController@students_enrolled')->name('dashboard.students');
Route::get('/dashboard/parent/create','DashboardController@create')->name('dashboard.create');
Route::get('/dashboard/parent/progress','DashboardController@progress')->name('dashboard.progress');
Route::post('/dashboard/parent', 'DashboardController@store')->name('dashboard.store');
Route::get('/dashboard/parent/{id}','DashboardController@login')->name('dashboard.login');
Route::get('/dashboard/{slug}/events','DashboardController@instructor_events')->name('dashboard.events');
Route::get('/dashboard/student', function () { return view('dashboard.student'); })->name('dashboard.student');

Route::post('post-rate', 'PostController@ratePost')->middleware('auth')->name('posts.rate');
Route::post('course-rate', 'CourseController@rateCourse')->middleware('auth')->name('courses.rate');

Route::post('instructor-rate', 'InstructorController@rateInstructor')->middleware('auth')->name('instructors.rate');
// Auth::routes();


//contact-us
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');
});

// Auth::routes();
Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('/users/register/{slug}','Auth\RegisterController@showRegistrationForm')->name('register')->where("slug","instructor|parent|student");
    Route::post('/users/register', 'Auth\RegisterController@register')->name('post.register');

// // Password reset process
//     Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//     Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
//     Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// // Password confirmation process
//     Route::get('/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//     Route::post('/password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm');

    // Password Reset Routes...
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email verification
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

});

//home page
Route::get('/', 'HomeController@index')->name('home');

Route::get('/redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('/home/{provider}', 'Auth\LoginController@handleProviderCallback')->name('login.access');

Route::get('/redirect/{driver}', 'Auth\RegisterController@redirectToProvider')->name('register.provider');
Route::get('/home/{provider}', 'Auth\RegisterController@handleProviderCallback')->name('register.access');

// Route::get('/banned',function(){ return view('banned');});
//Rate
