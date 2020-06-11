@extends('layouts.app')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/2548.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-150"> 
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
          <div class="col-md-8 blog-pull-right">
          <section>
        <div class="container pb-30">
          <div class="section-content">
            <div class="row">
    
            </div>
          </div>
        </div>
    </section>

          </div>
          <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Instructor <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                    <li><a href="{{route('dashboard','instructor')}}">Courses</a></li>
                    <li  class="active"><a href="{{route('dashboard.students',"instructor")}}">Students</a></li>
                    <li><a href="{{route('dashboard.events',"instructor")}}">Events</a></li>
                    <li><a href="#">Schedules</a></li>
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