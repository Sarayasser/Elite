<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $current_post = $course->posts()->where('read', 0)->orderBy('created_at', 'asc')->first();
        return view('posts.index', ['post' => $current_post]);
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
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Post $post)
    {
        return view('posts.edit', ['course' => $course->id, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
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
        return redirect()->route('posts.edit', ['course' => $request->course, 'post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
