@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/12345.jpg')}}" >
        <div class="container pt-150 pb-150"> 
            <!-- Section Content -->
            <div class="section-content">
                  <div class="col-md-6">
                    <h2 class="text-theme-color-yellow font-36">About</h2>
                    <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">About</li>
                    </ol>
                  </div>
            </div>
        </div>
    </section>


    <!-- Section: About -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-theme-color-sky line-bottom"><span class="text-theme-color-red">Welcome To Elite</span> <br> Where Robotics Becomes a Commonplace!</h2>
              <h4 class="text-theme-color-blue">We the founders of Elite started our platform after a careful consideration and study of the ever-changing nature of the world in the 21st century and how that very nature created a never-ending dependency over computers and robotics.   </h4>
              <p> Out of our belief that knowledge should be accessible to all and that education is a right to all and putting in mind the increase in poverty rates which impedes equal accessibility to information, we decided to create Elite to facilitate learning of robotics to youngsters all around the world free of charge. 
                We want to end educational poverty and help kids have the opportunity to dream and become whatever they want.
                </p>
                
            </div>
            <div class="col-md-6">
              <div class="video-popup">
                <a>
                  <img alt="" src="{{ asset('images/about/6.png') }}" class="img-responsive img-fullwidth">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
          <img alt="" src="{{ asset('images/bg/f2.png') }}" class="img-responsive img-fullwidth">
      </div>
    </section>

    <!-- Section: Features -->
    <section class="" data-bg-img="{{ asset('images/bg/p2.jpg') }}">
      <div class="container pb-0">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="line-bottom-center mt-0">Our <span class="text-theme-color-red">Owners</span></h2>
              <div class="title-flaticon">
                <i class="flaticon-charity-alms"></i>
              </div>
              <p>A group of motivated learning enthusiasts whose only concern is the spread of knowledge and equal access to information.
                 </p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
              <div class="team-member maxwidth400">
                <div class="team-thumb">
                    <img class="img-fullwidth mt-15" height="390px" src="{{asset('images/team/Ahmed-Gaber.jpg')}}" alt="">
                </a>
                </div>
                <div class="team-details bg-theme-color-yellow text-center pt-20 pb-5">
                  <div class="member-biography">
                    <h3 class="mt-0 text-white">Ahmed Gaber</h3>
                    <p class="mb-0 text-white">Web Developer</p>
                  </div>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                    <li><a href="https://www.facebook.com/ahmed.gaber.2013"><i class="fa fa-facebook text-white"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/ahmed-gaber-elgamal-eg/"><i class="fa fa-linkedin text-white"></i></a></li>
                    <li><a href="https://github.com/ahmed-gaber-elgamal"><i class="fa fa-github text-white"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
              <div class="team-member maxwidth400">
                <div class="team-thumb">
                    <img class="img-fullwidth mt-15" height="390px" src="{{asset('images/team/team2.jpg')}}" alt="">
                </a>
                </div>
                <div class="team-details bg-theme-color-sky text-center pt-20 pb-5">
                  <div class="member-biography">
                    <h3 class="mt-0 text-white">Al Haitham</h3>
                    <p class="mb-0 text-white">Web Developer</p>
                  </div>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                    <li><a href="https://www.facebook.com/AlHaitham.kamal"><i class="fa fa-facebook text-white"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/alhaitham-kamal/"><i class="fa fa-linkedin text-white"></i></a></li>
                    <li><a href="https://github.com/alhaithamkamal"><i class="fa fa-github text-white"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
              <div class="team-member maxwidth400">
                <div class="team-thumb">
                    <img class="img-fullwidth mt-15" height="390px" src="{{asset('images/team/team1.jpg')}}" alt="">
                </a>
                </div>
                <div class="team-details bg-theme-color-red text-center pt-20 pb-5">
                  <div class="member-biography">
                    <h3 class="mt-0 text-white">Sara Yasser</h3>
                    <p class="mb-0 text-white">Web Developer</p>
                  </div>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                    <li><a href="https://www.facebook.com/sara.y.elsayd"><i class="fa fa-facebook text-white"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/sara-yasser-970639111/"><i class="fa fa-linkedin text-white"></i></a></li>
                    <li><a href="https://github.com/Sarayasser"><i class="fa fa-github text-white"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
              <div class="team-member maxwidth400">
                <div class="team-thumb">
                    <img class="img-fullwidth mt-15" height="390px" src="{{asset('images/team/team1.jpg')}}" alt="">
                </a>
                </div>
                <div class="team-details bg-theme-color-red text-center pt-20 pb-5">
                  <div class="member-biography">
                    <h3 class="mt-0 text-white">Logain Hassan</h3>
                    <p class="mb-0 text-white">Web Developer</p>
                  </div>
                  <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                    <li><a href="https://www.facebook.com/logain.hassan.56"><i class="fa fa-facebook text-white"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/logeen-hassan-4a8710151/"><i class="fa fa-linkedin text-white"></i></a></li>
                    <li><a href="https://github.com/logainhassan"><i class="fa fa-github text-white"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            

          </div>
        </div>
      </div>
    </section>


    <!-- Section: Courses -->
    <section data-bg-img="{{ asset('images/bg/p2.jpg') }}" >
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="line-bottom-center mt-0">Our <span class="text-theme-color-red">Courses</span></h2>
              <div class="title-flaticon">
                <i class="flaticon-charity-alms"></i>
              </div>
              <p>A wide range of instructional videos and articles on robotics to aid your learning and further develop your existing knowledge. We provide interactive online sessions through Zoom Meetings to enhance the learning experience.</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="col-md-12">
              <div class="owl-carousel-3col" data-nav="true">
                  @foreach ($courses as $course)
                  @php
                      if (auth()->user() && auth()->user()->hasRole('student')) {
                          $course->enrolled = $course->students->contains(auth()->user());
                      }
                  @endphp
              <div class="item">
                  <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                      {{-- <img src="{{ asset('images/project/12.jpg')}}" alt="" class="img-fullwidth"> --}}
                      <img src="{{asset($course->image)}}" alt="" class="img-fullwidth" >
                      <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                      <h4 class="price-tag">${{$course->price}}</h4>
                      <h3 class="mt-0"><a class="text-theme-color-red" href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></h3>
                      <ul class="review_text list-inline">
                      <li>
                          <div class="star-rating" title="Rated {{$course->averageRating}} out of 5"><span data-width="{{$course->averageRating*20}}%">{{$course->averageRating}}</span></div>
                      </li>
                      </ul>
                  <p>{{ \Illuminate\Support\Str::limit($course->description, 100, '...') }}</p>
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
              @endforeach

              </div>
          </div>
          </div>
      </div>
  </section>


@endsection
