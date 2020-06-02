@extends('layouts.auth')

@section('content')
        <div class="row" style="margin-top: 30px;">
            <div class="col-4" style="margin-right: 40px;">
                <a href="{{route("register", "instructor")}}" >
                    <img class="card-img-top" style="width: 200px; height: 320px; border-radius: 15px;" src="{{ asset('images/instructor.png') }}" alt="Card image cap">
                </a>
            </div>
            <div class="col-4" style="margin-right: 40px;">
                <a href="{{route("register", "parent")}}" >
                    <img class="card-img-top" style="width: 200px; height: 320px; border-radius: 15px;" src="{{ asset('images/parent.png') }}" alt="Card image cap">
                </a>
            </div>
            <div class="col-4">
                <a href="{{route("register", "instructor")}}">
                    <img class="card-img-top" style="width: 200px; height: 320px; border-radius: 15px;" src="{{ asset('images/student.png') }}" alt="Card image cap">
                </a>
            </div>
        </div>
@endsection
