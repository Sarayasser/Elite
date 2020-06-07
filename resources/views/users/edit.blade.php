@extends('layouts.app')
@section('content')
<div class="ml-80">
<h3> Edit Profile </h3>
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
    <div class="form-group">
    <label for="location">Location <i class="fa fa-map-marker fa-3" aria-hidden="true"></i></label>
        <br>
        <input type="text" list="locations" name="address" class="col-lg-12" value="{{$user->address}}">
        <datalist id="locations">
        @foreach ($countries as $key=>$val)
            <option value="{{$val}}">
        @endforeach
            </datalist>
        <br>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" placeholder="Phone_number" name="phone_number" value="{{ $user->phone_number}}">
    </div>
    <div class="form-group">
        <label for="date">BirthDate</label>
        @if ($user->age)
        <input type="date" class="form-control" id="date"  name="age" value="{{Carbon\Carbon::parse($user->age)->format('m-d-Y')}}">
        @else
        <input type="date" class="form-control" id="date"  name="age" placeholder="Enter Date">        
        @endif
    </div>
    <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-control" name="password"  value="{{$user->password}}"/>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Retype password</label>
            <input type="password" class="form-control" name="password_confirmation"  />
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

@endsection