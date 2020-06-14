<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Gamify\Points\PostCompleted;
use App\Notification;

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

// Auth::routes();
Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

 // Registration Routes...
    Route::get('/users/register/{slug}','Auth\RegisterController@showRegistrationForm')->name('register')->where("slug","instructor|parent|student");
    Route::post('/users/register', 'Auth\RegisterController@register')->name('post.register');

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

//users
    Route::get('/users', function () { return view('auth/user'); })->name('users');

//login with google and facebook
    Route::get('/redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');

    Route::get('/users/register/{slug}/redirect/{driver}', 'Auth\RegisterController@redirectToProvider')->name('register.provider');
    Route::get('/home/{provider}', 'Auth\RegisterController@handleProviderCallback')->name('register.access');

});



Route::group(['middleware' => ['auth','verified','checkban']], function() {

    //Dashboard
    Route::get('/dashboard/{slug}','DashboardController@index')->name('dashboard')->where("slug","instructor|parent|student");
    Route::get('/dashboard/{slug}/students','DashboardController@students_enrolled')->name('dashboard.students');
    Route::get('/dashboard/parent/create','DashboardController@create')->name('dashboard.create')->middleware('role:parent');
    Route::get('/dashboard/{slug}/progress','DashboardController@progress')->name('dashboard.progress')->middleware('role:parent|student');
    Route::post('/dashboard/parent', 'DashboardController@store')->name('dashboard.store')->middleware('role:parent');
    Route::get('/dashboard/parent/{id}','DashboardController@login')->name('dashboard.login')->middleware('role:parent');
    Route::get('/dashboard/{slug}/events','DashboardController@instructor_events')->name('dashboard.events')->middleware('role:instructor');
    Route::get('/dashboard/{slug}/schedule','DashboardController@schedule')->name('dashboard.schedule')->middleware('role:instructor|student');

    //Profile
    Route::get('/profile/{user}','UserController@show')->name('user.show');
    Route::get('/profile/{user}/edit','UserController@edit')->name('user.edit');
    Route::put('/profile/{user}','UserController@update')->name('user.update');

    //instructor rate
    Route::post('instructor-rate', 'InstructorController@rateInstructor')->name('instructors.rate')->middleware('role:parent|student');

    //student enrollment
    Route::post('/courses/{course}/enroll', 'CourseController@enroll')->name('courses.enroll')->middleware('role:student');

    // comment
    Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');
    Route::delete('/posts/{post}/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

    Route::post('/courses/{course}/posts/{post}', function($course_id, Post $post){
        auth()->user()->readPosts()->attach($post->id);
        givePoint(new PostCompleted($post));
        return response()->json(['ok' => 'ok']);
    })->name('posts.read')->middleware('role:student');

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

    })->name('courses.enroll')->middleware('role:student');

    Route::post('events/{event}/attend', 'EventController@attend')->name('events.attend')->middleware('role:student');

    Route::post('post-rate', 'PostController@ratePost')->name('posts.rate')->middleware('role:student|parent');
    Route::post('course-rate', 'CourseController@rateCourse')->name('courses.rate')->middleware('role:student|parent');

    // Auth::routes();
    //Review
    Route::post('/add-review', 'CourseController@addReview')->name('courses.review')->middleware('role:student|parent');

});


Route::group(['middleware' => ['auth','role:admin|instructor','checkban']], function() {

    //event
    Route::get('/event/create', 'EventController@create')->name('events.create');
    Route::post('/event','EventController@store')->name('events.store');
    Route::get('/event/{event}/edit','EventController@edit')->name('events.edit');
    Route::put('/event/{event}','EventController@update')->name('events.update');
    Route::get('/event/delete/{event}','EventController@destroy')->name('events.destroy');

    //post
    Route::get('/courses/{course}/posts/create','PostController@create')->name('posts.create');
    Route::post('/courses/{course}/posts', 'PostController@store')->name('posts.store');
    Route::get('/courses/{course}/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('/courses/{course}/posts/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/courses/{course}/posts/{post}', 'PostController@destroy')->name('posts.destroy');


    //ckeditor
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

    //Schedule
    Route::get('/courses/{course}/schedule/create', 'ScheduleController@create')->name('schedule.create');
    Route::post('/schedule', 'ScheduleController@store')->name('schedule.store');
    Route::get('/schedule/delete/{schedule}','ScheduleController@destroy')->name('schedule.destroy');



});

// Events
Route::get('/event/{event}','EventController@show')->name('events.show');
Route::get('/event','EventController@index')->name('events.index');


// Courses
Route::get('/courses','CourseController@index')->name('courses.index');
Route::get('/courses/{course}','CourseController@show')->name('courses.show');

// Posts
Route::get('/courses/{course}/posts', 'PostController@index')->name('posts.index');
Route::get('/courses/{course}/posts/{post}', 'PostController@show')->name('posts.show');

Route::get('/about', function () {
    return view('about', [
        'course'=>Course::find(request()->course),'courses'=>Course::all(),'posts'=>Post::all(),'test'=>Notification::all()]);
     })->name('about');

//instructor
Route::get('/instructors', 'InstructorController@index')->name('instructors.index');
Route::get('/instructors/{instructor}', 'InstructorController@show')->name('instructors.show');


Route::get('/calender', function () { return view('calender'); });
Route::get('/courses-posts', function () { return view('courses_posts'); });
Route::get('/faq', function () { return view('faq'); })->name('faq');
Route::get('/timetable', function () { return view('timetable'); });

Route::get('/', 'HomeController@index')->name('home');

//contact-us
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

