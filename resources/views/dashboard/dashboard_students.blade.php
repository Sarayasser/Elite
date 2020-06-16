@extends('layouts.app')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/2548.jpg')}}">
        <div class="container pt-150 pb-150">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-100">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Students Enrolled</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Students</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 blog-pull-right mr-80">
          <section>
        <div class="container pb-30">
          <div class="section-content">
          <div class="row" style="height:20rem;width:60rem;">
          @foreach ($students as $student)
            <div class="col-md-4 card mr-15 mb-20" style="width: 18rem;height:25rem;background-color:#9370DB;color:white;">
            <div class="row">
            <div class="col">
            @if($student->image)
            <img class="card-img-top" src="{{$student->image}}" alt="Card image cap">
            @else
            @if($student->gender === 1)
            <img class="card-img-top" src="{{ asset('images/female.png')}}" alt="Card image cap">
            @else
            <img class="card-img-top" src="{{ asset('images/male.png')}}" alt="Card image cap">
            @endif
            @endif
            </div>
            <div class="col">
                <h5 class="card-title">{{$student->name}}</h5>
                <p class="card-text">{{$student->email}}</p>
                <h4> Total Points: {{$student->getPoints()}}</h4>
            </div>
            </div>
            </div>

            @endforeach
            </div>
          </div>
        </div>
    </section>

          </div>
          <div class="col-sm-3">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Instructor <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                    <li><a href="{{route('dashboard','instructor')}}">Courses</a></li>
                    <li  class="active"><a href="{{route('dashboard.students',"instructor")}}">Students</a></li>
                    <li><a href="{{route('dashboard.events',"instructor")}}">Events</a></li>
                    <li><a href="{{route('dashboard.schedule',"instructor")}}">Schedules</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
          <img alt="" src="images/bg/f2.png" class="img-responsive img-fullwidth">
      </div>
    </section>
@endsection
