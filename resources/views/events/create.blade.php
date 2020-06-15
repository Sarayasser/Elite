@extends('layouts.app')
@section('content')
<div class="ml-80">
<h2 class="text-theme-color-red line-bottom">Create Event </h2>
</div>
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
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Event Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
    </div>
    <div class="form-group">
        <label for="description	">Description</label>
        <textarea class="form-control" id="ckeditor" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile2">Image</label>
        <input type="file" id="exampleInputFile2" name="image">
    </div>
    <div class="form-group">
        <label for="location">Location <i class="fa fa-map-marker fa-3" aria-hidden="true"></i></label>
        <br>
        <input type="text" list="locations" name="location" class="col-lg-12">
        <datalist id="locations">
        @foreach ($countries as $key=>$val)
            <option value="{{$val}}">
        @endforeach
            </datalist>
        <br>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
    </div>

    <button type="submit" onclick="myFunction()" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
