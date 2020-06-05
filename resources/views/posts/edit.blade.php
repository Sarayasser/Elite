@extends('layouts.app')

@section('content')
<div class="container mt-50 mb-50">
    <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="description	">Content</label>
        <textarea class="form-control" id="ckeditor" name="description">{{$post->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile2">File input</label>
        <input type="file" id="exampleInputFile2" name="image">
        @if($post->image)
        <img src="{{asset($post->image)}}" width="200" height="150">
        @endif
    </div>

    <div class="checkbox">
        <label>
        <input type="checkbox"> Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
    </form>
</div>
@endsection
