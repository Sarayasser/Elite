@extends('layouts.app')

@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/510.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-150">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Courses</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="">Dashboard</a></li>
                    <li class="active">Courses</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
        <div class="col-sm-9 blog-pull-right">
          @foreach ($courses as $course)
          <div class="col-md-4">
            <div class="item">
              <div class="campaign bg-white maxwidth500 mb-30">
                <div class="thumb">
                @if($course->image)
                <img src="{{asset($course->image)}}" alt="" class="img-fullwidth" >
                @else
                <img class="img-fullwidth img-thumbnail" alt="" src="{{ asset('images/bg/3610647.jpg')}}">
                @endif
                <div class="campaign-overlay"></div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <h4 class="price-tag">$ {{$course->price}}</h4>
                  <h3 class="mt-0"><a class="text-theme-color-red" href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></h3>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated {{$course->rate}} out of 5"><span data-width="{{$course->rate*20}}%">{{$course->rate}}</span></div>
                    </li>
                  </ul>
                  <p>{{$course->description}} <a class="text-theme-colored ml-5" href="{{route('courses.show', $course->id)}}"> →</a></p>
                  <div class="course-details-bottom mt-15">
                    <ul class="list-inline">
                     <li>Capacity<span>{{$course->capacity}}</span></li>
                     <li>Duration<span>{{$course->duration}} mo</span></li>
                     <li>Age<span>{{$course->age}}y - {{$course->age+1}}y</span></li>


                    </ul>
                  </div>
                </div>
              </div>
            </div>
            </div>
          @endforeach
          </div>
          <div class="col-sm-3">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Instructor <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                    <li class="active"><a href="">Courses</a></li>
                    <li><a href="{{route('dashboard.students',"instructor")}}">Students</a></li>
                    <li><a href="{{route('dashboard.events')}}">Events</a></li>
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
