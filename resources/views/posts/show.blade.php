@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="d-inline card-title">Title :- </h5>{{ $post->title }}
            <h5 class="card-text">Description :- </h5>{!! $post->description !!}
        </div>
        @if($post->image)
        <div>
            <img src="{{asset($post->image)}}" class="card-img-top" alt="image">
        </div>
        @endif
        @if(Auth::user())
        @if (Auth::user()->id == $post->user->id)
        <a href="{{route('posts.edit', ['course' => $course, 'post' => $post->id])}}" class="btn btn-info">Edit</a>
        <form action="{{route('posts.destroy', ['course' => $course, 'post' => $post->id])}}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endif
        @endif
    </div>
    <br>
</div>
@endsection
