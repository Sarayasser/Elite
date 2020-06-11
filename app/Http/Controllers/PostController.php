<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use willvincent\Rateable\Rating;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()

    // {

    //     $this->middleware('auth');

    // }
    public function index(Course $course)
    {
        $readPostsIds = auth()->user()->readPosts()->having('course_id', $course->id)->get()->pluck('id')->toArray();
        $post = $course->posts()->whereNotIn('id', $readPostsIds)->first();
        if($post ==  null)
            return redirect()->route('courses.show', $course->id);
        $has_next = false;
        $ids = $course->posts->pluck('id')->toArray();
        if (in_array($post->id+1, $ids))
            $has_next = true;
        
        return view('posts.index', ['post' => $post, 'has_next' => $has_next]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('posts.create', ['course' => $course->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Course $course)
    {
        $post = $course->posts()->create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user()->id
        ]);
        $post->image = $request->file('image');
        $post->save();
        return redirect()->route('posts.show', ['course' => $course->id, 'post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($course_id, Post $post)
    {
        return view('posts.show', ['post' => $post, 'course' => $course_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Post $post)
    {
        $comments = $post->comments()->with('replies')->get();
        return view('posts.edit', ['course' => $course->id, 'post' => $post, 'comments' => $comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $course_id, Post $post)
    {
        $attributes = [
                'title' => $request->title,
                'description' =>  $request->description,
            ];
        $post->update($attributes);
        if ($request->hasFile('image')){
            Storage::delete('public/'.$post->image);
            $post->image = $request->file('image');
            $post->save();
        }
        return redirect()->route('posts.show', ['course' => $course_id, 'post' => $post->id]);
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
        $post->delete();
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
