<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $test = (new HomeController)->note();
        $attributes = $request->validate(['body' => 'required|profanity|max:140']);
    	Comment::create($request->all());
    	return redirect()->route('posts.show', ['course' => $post->course->id, 'post' => $post->id, 'test'=>$test]);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
    	return redirect()->route('posts.show', ['course' => $post->course->id, 'post' => $post->id]);
    }
}
