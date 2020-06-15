@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/946.jpg')}}" >
        <div class="container pt-150 pb-150">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Schedule</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('dashboard','student')}}">Dashboard</a></li>
                    <li class="active">Schedule</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section>
    <div class="row mt-50 mb-50">
    <div class="col">
    <div class="container">
    <table class="table">
  <thead class="thead-dark" style="background-color:#008080;color:white;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">StartDate</th>
      <th scope="col">Time</th>
      <th scope="col">Course</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($schedules as $schedule)
  <tr>
      <th scope="row">{{$schedule->id}}</th>
      <td>{{$schedule->start_date}}</td>
      <td>{{$schedule->time}}</td>
      <td>{{$schedule->course->name}}</td>
      <td><a href="{{$schedule->link}}">Meeting Link</a></td>
    </tr>
  @endforeach
  </tbody>
</table></div>
    </div>
    <div class="col">
    </div>
    </div>
    </section>

@endsection
