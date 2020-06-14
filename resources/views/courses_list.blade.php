@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/3611.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-100">
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
    <div class="dropdown mt-3">
      <button onclick="myFunction()" class="dropbtn fa fa-search">  Find Course </button>
      <div id="myDropdown" class="dropdown-content">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        @if($courses->count())
        @foreach($courses as $course)
        <a href="{{route('courses.show', $course->id)}}">{{ $course->name }}</a>
        @endforeach
        @else
  
        <h3 class="text-danger">Result not found.</h3>
  
        @endif
        
      </div>
    
    </div>
  
    <!-- Section: Course gird -->
    <section>
      <div class="container">
        <div class="row">
        
          @foreach ($courses as $course)
          @php
              if (auth()->user() && auth()->user()->hasRole('student')) {
                  $course->enrolled = $course->students->contains(auth()->user());
              }
          @endphp

          <div class="col-sm-6 col-md-4 mb-30">
            
            <div class="item">
              <div class="campaign bg-white maxwidth500">
                <div class="thumb">
                @if($course->image)
                <img src="{{asset($course->image)}}" alt="" class="img-fullwidth" >
                @else
                <img class="img-fullwidth img-thumbnail" alt="" src="{{ asset('images/bg/3610647.jpg')}}">
                @endif
                
                <div class="campaign-overlay"></div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <h3 class="mt-0"><a class="text-theme-color-red" href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></h3>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated {{$course->averageRating}} out of 5"><span data-width="{{$course->averageRating*20}}%">{{$course->averageRating}}</span></div>
                    </li>
                  </ul>
                  <p>{{$course->description}} <a class="text-theme-colored ml-5" href="{{route('courses.show', $course->id)}}"> ▶️</a></p>
                  <div class="course-details-bottom mt-15">
                    <ul class="list-inline">
                     <li>Capacity<span>{{$course->capacity}}</span></li>
                     <li>Duration<span>{{$course->duration}} mo</span></li>
                     <li>Age<span>{{$course->age}}y - {{$course->age+1}}y</span></li>
                    </ul>
                  </div>
                  @if(auth()->user())
                      @if(!$course->enrolled && auth()->user()->hasRole('student') && $course->capacity > 0)
                      <br>
                      <a class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20 jquery-postback center-block" href="{{route('courses.enroll', $course->id)}}">Enroll</a>
                      @endif
                  @endif
                  @if($course->capacity <= 0)
                    <br>
                    <p class="text-danger">This course is not available at the moment</p>
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
