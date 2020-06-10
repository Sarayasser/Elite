@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Courses</h2>
                <ol class="breadcrumb text-left mt-10 white">
                  <li><a href="{{route('home')}}">Home</a></li>
                    
                    <li class="active">Courses</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Section: Course gird -->
    <section>
      <div class="container">
        <div class="row">
          
          @foreach ($courses as $course)
          @php
              if (auth()->user() && auth()->user()->hasRole('student')) {
                  $course->enrolled = $course->students->contains(auth()->user()->student);
              }
          @endphp
         
          <div class="col-sm-6 col-md-4">
            <div class="item">
              <div class="campaign bg-white maxwidth500 mb-30">
                <div class="thumb">
                <img src="{{asset($course->image)}}" alt="" class="img-fullwidth" >
                <div class="campaign-overlay"></div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <h4 class="price-tag">$ {{$course->price}}</h4>
                  <h3 class="mt-0"><a class="text-theme-color-red" href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></h3>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated {{$course->averageRating}} out of 5"><span data-width="{{$course->averageRating*20}}%">{{$course->averageRating}}</span></div>
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
                  @if(auth()->user())
                      @if(!$course->enrolled && auth()->user()->hasRole('student'))
                      <br>
                      <a class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20 jquery-postback center-block" href="{{route('courses.enroll', $course->id)}}">Enroll</a>
                      @endif
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </section>

     

@endsection