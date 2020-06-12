@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-8 blog-pull-right">
            <div class="single-service">
                <br>
                <h2 class="text-theme-color-red line-bottom">Courses
                <button class="btn btn-info" type="button" style="float:right; font-size: 18px; padding: 11px 36px; margin-top: 17px;">
                    <a href="{{route('courses.index')}}" style="color:white;"> Add Course  </a>
                </button>
                </h2>
                @if(!$courses->isempty())
                    @foreach($courses as $course)
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                        <h3 class="panel-title" style="font-size:25px;">
                            {{$course->name}}
                        </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="image-box-thum">
                                        @if($course->image)
                                            <img src="{{ asset($course->image)}}" alt="" style="margin-right: 50px;" width="195px" height="195px">
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-8">

                                        <p style="color: #a94442; font-size: 20px;">
                                            Instructor: <span style=" font-size: 15px;  color: black;">{{$course->instructor->name}}</span>
                                        </p>
                                        <p style="color: #a94442; font-size: 20px;">
                                            Duration: <span style="font-size: 15px; color: black;">{{$course->duration}} Months</span>
                                        </p>
                                        <p style="color: #a94442; font-size: 20px;">
                                            Description: <span style="font-size: 15px; color: black;">{{substr($course->description,0,70)."....."}}</span>
                                        </p>
                                        <ul class="review_text list-inline">
                                            <li>
                                              <div class="star-rating" title="Rated {{$course->averageRating}} out of 5"><span data-width="{{$course->averageRating*20}}%">{{$course->averageRating}}</span></div>
                                            </li>
                                          </ul>
                                        <button class="btn btn-danger" type="button" style="float:right; font-size:15px;">
                                            <a href="{{route('courses.show',['course'=> $course])}}" style="color:white;"> Details </a>
                                        </button>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h3>There is no courses , you need to enroll to courses</h3>
                @endif
            </div>
            </div>
            <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
                <div class="widget">
                <h3 class="widget-title line-bottom">Student <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                    <ul class="list list-border">
                        <li class="active"><a href="">Courses</a></li>
                        <li><a href="{{route('dashboard.progress','student')}}">Progress and Achievements</a></li>
                        <li><a href="{{route('dashboard.schedule','student')}}">Schedules</a></li>
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
