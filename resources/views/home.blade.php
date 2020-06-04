@extends('layouts.app')

@section('content')
        <!-- Section: home -->
        <section id="home" class="divider parallax fullscreen" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/bg2.jpg')}}">
            <div class="display-table">
              <div class="display-table-cell">
                <div class="container pt-150 pb-150">
                  <div class="row">
                    <div class="col-md-10 col-md-push-5">
                      <div class="pb-50 pt-30">
                         <h2 class="text-white bg-dark-transparent-4 inline-block pl-30 pr-30 mb-5 pt-5 pb-5">Kindergarten School</h2>
                        <h1 class="text-white inline-block bg-theme-colored-transparent font-48 mt-0 pr-20 pl-20">KidsPro Childern Education</h1>
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
        <section id="welcome" class="divider layer-overlay overlay-dark-7 parallax" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/bg4.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                    <h2 class="text-theme-color-sky line-bottom">Welcome To <span class="text-theme-color-red">KidsPro</span> <br> Best Education in Our Kindergarden</h2>
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
        <section id="services" class="divider parallax layer-overlay overlay-dark-5" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/bg1.jpg')}}">
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

                    <div class="item">
                        <div class="campaign bg-white maxwidth500 mb-30">
                        <div class="thumb">
                            <img src="{{ asset('images/project/12.jpg')}}" alt="" class="img-fullwidth">
                            <div class="campaign-overlay"></div>
                        </div>
                        <div class="course-details clearfix p-20 pt-15">
                            <h4 class="price-tag">${{$course->price}}</h4>
                            <h3 class="mt-0"><a class="text-theme-color-red" href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></h3>
                            <ul class="review_text list-inline">
                            <li>
                                <div class="star-rating" title="Rated {{$course->rate}} out of 5"><span data-width="{{$course->rate*20}}%">{{$course->rate}}</span></div>
                            </li>
                            </ul>
                        <p>{{$course->description}}</p>
                            <div class="course-details-bottom mt-15">
                            <ul class="list-inline">
                                <li>Capacity<span>{{$course->capacity}}</span></li>
                                <li>Duration<span>{{$course->duration}}</span></li>
                                <li>Age<span>{{$course->age}}y - {{$course->age+1}}y</span></li>
                            </ul>
                            </div>
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
        <section id="experts" class="divider parallax layer-overlay overlay-dark-4" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/bg5.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-white">Our <span class="text-theme-colored"> Teachers</span></h2>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="team-members">
                    <div class="col-md-3 col-sm-6">
                    <div class="team-member maxwidth400 mb-sm-15">
                        <div class="team-thumb">
                        <img class="img-fullwidth mt-15" src="{{ asset('images/team/team1.jpg')}}" alt="">
                        </div>
                        <div class="team-details bg-theme-color-sky text-center pt-20 pb-5">
                        <div class="member-biography">
                            <h3 class="mt-0 text-white">Steve Smith</h3>
                            <p class="mb-0 text-white">English Teacher</p>
                        </div>
                        <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                            <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <div class="team-member maxwidth400 mb-sm-15">
                        <div class="team-thumb">
                        <img class="img-fullwidth mt-15" src="{{ asset('images/team/team2.jpg')}}" alt="">
                        </div>
                        <div class="team-details bg-theme-color-yellow text-center pt-20 pb-5">
                        <div class="member-biography">
                            <h3 class="mt-0 text-white">Steve Smith</h3>
                            <p class="mb-0 text-white">English Teacher</p>
                        </div>
                        <ul class="styled-icons icon-dark icon-circled icon-theme-color-sky pt-5">
                            <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                    <div class="team-member maxwidth400 mb-sm-15">
                        <div class="team-thumb">
                        <img class="img-fullwidth mt-15" src="{{ asset('images/team/team4.jpg')}}" alt="">
                        </div>
                        <div class="team-details bg-theme-color-red text-center pt-20 pb-5">
                        <div class="member-biography">
                            <h3 class="mt-0 text-white">Steve Smith</h3>
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
                    <div class="col-md-3 col-sm-6">
                    <div class="team-member maxwidth400 mb-sm-15">
                        <div class="team-thumb">
                        <img class="img-fullwidth mt-15" src="{{ asset('images/team/team9.jpg')}}" alt="">
                        </div>
                        <div class="team-details bg-theme-color-green text-center pt-20 pb-5">
                        <div class="member-biography">
                            <h3 class="mt-0 text-white">Steve Smith</h3>
                            <p class="mb-0 text-white">English Teacher</p>
                        </div>
                        <ul class="styled-icons icon-dark icon-circled icon-theme-color-orange pt-5">
                            <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    
        <!-- Section: blog -->
        <section id="blog" class="divider parallax layer-overlay overlay-dark-6" data-parallax-ratio="0.1" data-bg-img="{{ asset('images/bg/bg1.jpg')}}">
            <div class="container pt-150 pb-150">
                <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-white line-bottom-centered">Latest <span class="text-theme-colored"> News</span></h2>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                </div>
                <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="post clearfix mb-sm-30 bg-silver-light">
                        <div class="entry-header">
                        <div class="post-thumb thumb"> 
                            <img src="{{ asset('images/blog/1.jpg')}}" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                        </div>
                        <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                            <ul>
                                <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                                <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                            </div>
                            <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                                <h4 class="entry-title text-white m-0 mt-5"><a href="#">This is a standard post with thumbnail</a></h4>                      
                            </div>
                            </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.
                        </div>
                        <div class="bg-theme-colored p-5 text-center pt-10 pb-10">
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-share-alt mr-5 text-white"></i>24 Share</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-white"></i> 214 Comments</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-heart-o mr-5 text-white"></i> 895 Likes</span>
                        </div>
                    </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="post clearfix mb-sm-30 bg-silver-light">
                        <div class="entry-header">
                        <div class="post-thumb thumb"> 
                            <img src="{{ asset('images/blog/2.jpg')}}" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                        </div>
                        <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                            <ul>
                                <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                                <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                            </div>
                            <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                                <h4 class="entry-title text-white m-0 mt-5"><a href="#">This is a standard post with thumbnail</a></h4>                      
                            </div>
                            </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.
                        </div>
                        <div class="bg-theme-colored p-5 text-center pt-10 pb-10">
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-share-alt mr-5 text-white"></i>24 Share</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-white"></i> 214 Comments</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-heart-o mr-5 text-white"></i> 895 Likes</span>
                        </div>
                    </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="post clearfix mb-sm-30 bg-silver-light">
                        <div class="entry-header">
                        <div class="post-thumb thumb"> 
                            <img src="{{ asset('images/blog/3.jpg')}}" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                        </div>
                        <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                            <ul>
                                <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                                <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                            </div>
                            <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                                <h4 class="entry-title text-white m-0 mt-5"><a href="#">This is a standard post with thumbnail</a></h4>                      
                            </div>
                            </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.
                        </div>
                        <div class="bg-theme-colored p-5 text-center pt-10 pb-10">
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-share-alt mr-5 text-white"></i>24 Share</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-white"></i> 214 Comments</span>
                            <span class="mb-10 text-white mr-10 font-13"><i class="fa fa-heart-o mr-5 text-white"></i> 895 Likes</span>
                        </div>
                    </article>
                    </div>
                </div>
                </div>
            </div>
        </section>

@endsection