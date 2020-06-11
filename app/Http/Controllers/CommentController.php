<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
    	$attributes = $request->validate(['body' => 'required|max:140']);
    	$attributes['user_id'] = auth()->id();
    	$attributes['commentable_type'] = 'App\Post';
    	$attributes['commentable_id'] = $post->id;

    	$comment = Comment::create($attributes);

    	return redirect()->route('posts.show', ['course' => $post->course->id, 'post' => $post->id]);
    }



    // public function update(Request $request, Comment $comment)
    // {
    // 	$comment->update($request->all());

    // 	return new CommentResource($comment);

    // }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        // return new CommentResource($comment);
    }
}
