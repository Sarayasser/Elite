@extends('layouts.app')
@section('content')
<div class="ml-80">
<h3> Event </h3>
</div>
<div class="container mt-50 mb-50">
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
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection