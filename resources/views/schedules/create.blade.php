@extends('layouts.app')
@section('content')
<div class="ml-80">
<h3> Schedule </h3>
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
    <form method="POST" action="{{ route('schedule.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="date">StartDate</label>
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="start_date">
    </div>
    
    <br>
    <div class="md-form md-outline">
    <label for="default-picker"> Time Picker</label>
    <input type="time" id="default-picker" class="form-control" placeholder="Select time" name="time">
    </div>
    <br>
    <div style="display: none;">
    <label for="date">Course</label>
    <input type="text" class="form-control inactive" id="link" placeholder="Enter Meeting Link" name="course_id" value="{{$course->id}}">
    </div>
    <button type="submit" id="mylink" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
