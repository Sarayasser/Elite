@extends('layouts.app')

@section('content')
<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
        <div class="row"> 
            <div class="col-md-6">
            <h2 class="text-theme-color-yellow font-36">Create Post</h2>
            <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('courses.show', $course)}}">Course Details</a></li>
                <li class="active">Create Post</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
</section>
<div class="container mt-50 mb-50">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('posts.store', ['course' => $course]) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    </div>
    <div class="form-group">
        <label for="description	">Content</label>
        <textarea class="form-control" id="ckeditor" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile2">File input</label>
        <input type="file" id="exampleInputFile2" name="image">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection