@extends('layouts.app')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Instructor Dashboard</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
<div class="row">
<div class="container-fluid col ml-10">
<div class="list-group col-md-3 mt-10">
  <a href="{{route('dashboard.instructor')}}" class="list-group-item" style="background:blue;color:white;"><i class="fa fa-book" style="color:white;"></i> Courses</a>
  <a href="{{route('dashboard.students')}}" class="list-group-item"><i class="fa fa-user"></i> Students</a>
  <a href="{{route('dashboard.events')}}" class="list-group-item"><i class="fa fa-pencil"></i> Events</a>
  <a href="#" class="list-group-item"><i class="fa fa-cog"></i> Schedule</a>
</div>
</div>
<div class="col">
</div>
</div>


@endsection