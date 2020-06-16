<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use willvincent\Rateable\Rating;
use App\Notification;
use App\Http\Controllers\HomeController;
use App\Events\PostAdded;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Course $course)
    {   $test = (new HomeController)->note();
        $readPostsIds = auth()->user()->readPosts()->having('course_id', $course->id)->get()->pluck('id')->toArray();
        $post = $course->posts()->whereNotIn('id', $readPostsIds)->first();
        if($post ==  null)
            return redirect()->route('courses.show', $course->id);
        $has_next = false;
        $ids = $course->posts->pluck('id')->toArray();
        if (in_array($post->id+1, $ids))
            $has_next = true;

        return view('posts.index', ['post' => $post, 'has_next' => $has_next,'test'=>$test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {   $test = (new HomeController)->note();
        if ($course->user_id == auth()->id())
            return view('posts.create', ['course' => $course->id,'test'=>$test]);
        else {
            toastr()->error("you are not assigned for this course");
            return redirect()->route('courses.show', $course->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Course $course)
    {   $test = (new HomeController)->note();
        $post = $course->posts()->create([
            'video' => $request->video,
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user()->id
        ]);
        $post->image = $request->file('image');
        $post->save();
        // dd($post->course_id);
        Notification::create([
            'description'=> 'New Post created for course',
            'post_id' => $post->id,
            'course_id' => $post->course_id,
        ]);
        $note = array(
            'message' => 'New Post Added Successfully',
            'alert-type' => 'success'
        );
        // event(new PostAdded('hello world'));
        event(new PostAdded($course->name));
        return redirect()->route('posts.show', ['course' => $course->id, 'post' => $post->id,'test'=>$test])->with($note);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($course_id, Post $post)
    {   $test = (new HomeController)->note();
        $comments = $post->comments()->with('replies')->get();
        if($post->course_id == $course_id)
            return view('posts.show', ['post' => $post, 'course' => $course_id, 'comments' => $comments,'test'=>$test]);
        else {
            toastr()->error("you entered a wrong url");
            return redirect()->route('courses.show', $course_id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Post $post)
    {   $test = (new HomeController)->note();
        if(auth()->id() == $post->user_id)
            return view('posts.edit', ['course' => $course->id, 'post' => $post,'test'=>$test]);
        else {
            toastr()->error("you are not authorized to view this page");
            return redirect()->route('courses.show', $course->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $course_id, Post $post)
    {   $test = (new HomeController)->note();
        $attributes = [
                'title' => $request->title,
                'description' =>  $request->description,
                'video' => $request->video,
            ];
        $post->update($attributes);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$post->image);
            $post->image = $request->file('image');
            $post->save();
        }
        return redirect()->route('posts.show', ['course' => $course_id, 'post' => $post->id,'test'=>$test]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, Post $post)
    {
        if ($post->image) Storage::delete('public/'.$post->image);
        if (auth()->id() == $post->user_id)
            $post->delete();
        else
            toastr()->error("you are not authorized to view this page");
        return redirect()->route('courses.show', $course_id);
    }

    public function ratePost()
    {
        $post = Post::find(request()->id);
        $rating = $post->ratings()->where('user_id', auth()->user()->id)->first();
        if(is_null($rating) ){
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $post->ratings()->save($rating);
            return redirect()->back();
        }

        if( $rating->rating<=5){

            $post->ratings()->where('user_id', auth()->user()->id)->first()->delete($rating);
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating =  request()->rate;
            $rating->user_id = auth()->user()->id;
            $post->ratings()->save($rating);
            return redirect()->back();
        }
        if( $rating->rating==null){

            return redirect()->back()->with("invalid rating");
        }
        else{
            return redirect()->back()->with("You already made a review");
        }
    }
}
