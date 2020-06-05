@extends('layouts.app')
@section('content')
<div class="ml-80">
<h3> Edit Profile </h3>
</div>
<div class="container mt-50 mb-50">
    <form method="POST" action="{{ route('user.update',['user'=>$user->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $user->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputFile2">Image</label>
        <input type="file" id="exampleInputFile2" name="image" value="{{$user->image}}">
    </div>
   
    
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

@endsection