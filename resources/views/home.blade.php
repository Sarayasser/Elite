@extends('layouts.app')

@section('content')
        <!-- Section: home -->
        <section id="home" class="divider parallax fullscreen" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/3241.jpg')}}">
            <div class="display-table">
              <div class="display-table-cell">
                <div class="container pt-150 pb-150">
                  <div class="row">
                    <div class="col-md-10 col-md-push-5">
                      <div class="pb-50 pt-30">
                         <h2 class="text-white bg-dark-transparent-4 inline-block pl-30 pr-30 mb-5 pt-5 pb-5">Elite E-Learning School</h2>
                        <h1 class="text-white inline-block bg-theme-colored-transparent font-48 mt-0 pr-20 pl-20">Elite for Childern Education</h1>
                        <p class="font-16 text-black-222">Every day we bring hope to millions of children in the world's<br> hardest places as a sign of God's unconditional love. </p>
                        <a class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20" href="#">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

        <!-- Section: welcome -->
        <section id="welcome" class="divider layer-overlay overlay-dark-7 parallax" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/12345.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                    <h2 class="text-theme-color-sky line-bottom">Welcome To <span class="text-theme-color-red">Elite</span> <br> Best Education in Our Kindergarden</h2>
                    <h4 class="text-theme-color-red">Lorem ipsum dolor sit amet soluta saepe odit error, maxime praesentium sunt udiandae!</h4>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae dolor quas et perspiciatis voluptatum accusantium delectus nisi reprehenderit, eveniet fuga modi pariatur, eius vero. Ea vitae maiores.</p>
                        <a href="#" class="btn btn-flat btn-colored btn-theme-color-blue mt-15 mr-15">Read More</a><a href="#" class="btn btn-flat btn-colored btn-theme-color-yellow mt-15">Get a Quote</a>
                    </div>
                    <div class="col-md-6">
                    <div class="video-popup">
                        <a>
                        <img alt="" src="{{ asset('images/about/6.png')}}" class="img-responsive img-fullwidth">
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Section: Services -->
        <section id="services" class="divider parallax layer-overlay overlay-dark-5" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/3604.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="line-bottom-center text-white mt-0">Our <span class="text-theme-color-red">Courses</span></h2>
                    <div class="title-flaticon">
                        <i class="flaticon-charity-alms"></i>
                    </div>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
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
                        <div class="thumb" style="height:10rem;">
                            {{-- <img src="{{ asset('images/project/12.jpg')}}" alt="" class="img-fullwidth"> --}}
                            @if($course->image)
                            <img src="{{asset($course->image)}}" alt="" class="img-fullwidth">
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
                        <p>{{ \Illuminate\Support\Str::limit($course->description, 100, '...') }}</p>
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
                    @endforeach

                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Section: Experts -->
        <section id="experts" class="divider parallax layer-overlay overlay-dark-4" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/3237.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-white">Our <span class="text-theme-colored"> Instructors</span></h2>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="team-members">
                    @foreach($instructors as $instructor)
                        <div class="col-md-3 col-sm-6">
                            <div class="team-member maxwidth400 mb-sm-15">
                                <div class="team-thumb">
                                    <a href={{route('instructors.show',['instructor'=> $instructor])}}>
                                        @if($instructor->user->image)
                                            <img class="img-fullwidth mt-15" height="390px" src="{{$instructor->user->image}}" alt="">
                                        @else
                                        <img class="img-fullwidth mt-15" height="390px" src="{{asset('images/bg/1234.jpg')}}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="team-details bg-theme-color-red text-center pt-20 pb-5">
                                <div class="member-biography">
                                    <h3 class="mt-0 text-white">{{$instructor->user->name}}</h3>
                                    <p class="mb-0 text-white">English Teacher</p>
                                </div>
                                <ul class="styled-icons icon-dark icon-circled icon-theme-color-green pt-5">
                                    <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </section>

        <!-- Section: blog -->
        <section id="blog" class="divider parallax layer-overlay overlay-dark-6" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/3604.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-white line-bottom-centered">Latest <span class="text-theme-colored"> Events</span></h2>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                </div>
                <div class="section-content">
                <div class="row">
                <div class="col-md-12">
                <div class="owl-carousel-3col" data-nav="true">
                @foreach ($events as $event)
                    <article class="post clearfix mb-sm-30 bg-silver-light">
                        <div class="entry-header">
                        <div class="post-thumb thumb">
                        @if($event->image)
                            <a href="{{route('events.show',['event'=>$event->id])}}"><img src="{{ asset($event->image)}}" alt="" class="img-responsive img-fullwidth">
                            </a>
                        @else
                        <a href="{{route('events.show',['event'=>$event->id])}}">
                        <img src="{{ asset('images/bg/32818.jpg')}}" alt="" class="img-responsive img-fullwidth">
                        </a>
                        @endif
                        </div>
                        </div>
                        <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                            <ul>
                                <li class="font-16 text-white font-weight-600 border-bottom">{{ $event->date->format('d') }}</li>
                                <li class="font-12 text-white text-uppercase">{{ $event->date->format('M') }}</li>
                            </ul>
                            </div>
                            <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                                <h4 class="entry-title text-white m-0 mt-5"><a href="#">{{$event->name}}</a></h4>
                                <ul class="list-inline font-11 text-black">
                                @if ($event->date->format('w') == 1)
                                <li><i class="fa fa-calendar mr-5"></i> Monday</li>
                                @elseif ($event->date->format('w') == 2)
                                <li><i class="fa fa-calendar mr-5"></i> Tuesday</li>
                                @elseif ($event->date->format('w') == 3)
                                <li><i class="fa fa-calendar mr-5"></i> Wednesday</li>
                                @elseif ($event->date->format('w') == 4)
                                <li><i class="fa fa-calendar mr-5"></i> Thursday</li>
                                @elseif ($event->date->format('w') == 5)
                                <li><i class="fa fa-calendar mr-5"></i> Friday</li>
                                @elseif ($event->date->format('w') == 6)
                                <li><i class="fa fa-calendar mr-5"></i> Saturday</li>
                                @else
                                <li><i class="fa fa-calendar mr-5"></i> Sunday</li>
                                @endif
                                <li><i class="fa fa-map-marker mr-5"></i> {{$event->location}}</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <p class="mt-10">{!! substr($event->description, 0, 40) !!}</p>
                        </div>
                    </article>
                    @endforeach
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

@endsection
