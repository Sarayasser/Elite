@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/posts" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    </div>
    <div class="form-group">
        <label for="description	">Content</label>
        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputFile2">File input</label>
        <input type="file" id="exampleInputFile2" name="image">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
        <input type="checkbox"> Check me out
        </label>
    </div> -->
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection