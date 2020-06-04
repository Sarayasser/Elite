@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Instructors</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Instructors</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Section: Team -->
    <section id="team">
      <div class="container">
        <div class="row mtli-row-clearfix">
         <div class="team-members">
          
            @foreach($instructors as $instructor)
              <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
                <div class="team-member maxwidth400">
                  <div class="team-thumb">
                    <a href={{route('instructors.show',['instructor'=> $instructor])}}>
                    @if($instructor->user->image)
                        <img class="img-fullwidth mt-15" height="390px" src="{{$instructor->user->image}}" alt="">                     
                    @else
                      @if($instructor->user->gender == "female")
                        <img class="img-fullwidth mt-15" height="390px" src="images/team/team1.jpg" alt="">
                      @else
                        <img class="img-fullwidth mt-15" height="390px" src="images/team/team9.jpg" alt="">
                      @endif
                    @endif
                  </a>
                  </div>
                  <div class="team-details bg-theme-color-sky text-center pt-20 pb-5">
                    <div class="member-biography">
                      <h3 class="mt-0 text-white">{{$instructor->user->name}}</h3>
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
            @endforeach
            
         </div>
        </div>
      </div>
    </section>
{{-- 
    <!-- Divider: Funfact -->
    <section class="divider" data-bg-img="{{ asset('images/bg/p5.jpg') }}">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="864" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white">Qualified Teachers</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="486" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white">Successful Kids</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="1468" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white">Happy Parents</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-medal mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="32" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white">Award Won</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Courses -->
    <section data-bg-img="{{ asset('images/bg/p2.jpg') }}">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="line-bottom-center mt-0">Our <span class="text-theme-color-red">Courses</span></h2>
              <div class="title-flaticon">
                <i class="flaticon-charity-alms"></i>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="col-md-12">
            <div class="owl-carousel-3col" data-nav="true">
              <div class="item">
                <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                    <img src="{{ asset('images/project/12.jpg') }}" alt="" class="img-fullwidth">
                    <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                    <h4 class="price-tag">$250</h4>
                    <h3 class="mt-0"><a class="text-theme-color-red" href="#">Learning Classes</a></h3>
                    <ul class="review_text list-inline">
                      <li>
                        <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor adipisicing elit. Prsent quossit sit amet consect adipisicin elit quosit</p>
                    <div class="course-details-bottom mt-15">
                      <ul class="list-inline">
                       <li>Capacity<span>20 kids</span></li>
                       <li>Duration<span>45 min</span></li>
                       <li>Age<span>5y - 6y</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                    <img src="{{ asset('images/project/13.jpg') }}" alt="" class="img-fullwidth">
                    <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                    <h4 class="price-tag">$250</h4>
                    <h3 class="mt-0"><a class="text-theme-color-lemon" href="#">Multimedia Classes</a></h3>
                    <ul class="review_text list-inline">
                      <li>
                        <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">4.50</span></div>
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor adipisicing elit. Prsent quossit sit amet consect adipisicin elit quosit</p>
                    <div class="course-details-bottom mt-15">
                      <ul class="list-inline">
                       <li>Capacity<span>20 kids</span></li>
                       <li>Duration<span>45 min</span></li>
                       <li>Age<span>5y - 6y</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                    <img src="{{ asset('images/project/14.jpg') }}" alt="" class="img-fullwidth">
                    <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                    <h4 class="price-tag">$250</h4>
                    <h3 class="mt-0"><a class="text-theme-color-sky" href="#">Language Classes</a></h3>
                    <ul class="review_text list-inline">
                      <li>
                        <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor adipisicing elit. Prsent quossit sit amet consect adipisicin elit quosit</p>
                    <div class="course-details-bottom mt-15">
                      <ul class="list-inline">
                       <li>Capacity<span>20 kids</span></li>
                       <li>Duration<span>45 min</span></li>
                       <li>Age<span>5y - 6y</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                    <img src="{{ asset('images/project/15.jpg') }}" alt="" class="img-fullwidth">
                    <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                    <h4 class="price-tag">$250</h4>
                    <h3 class="mt-0"><a class="text-theme-color-green" href="#">Drawing Classes</a></h3>
                    <ul class="review_text list-inline">
                      <li>
                        <div class="star-rating" title="Rated 4.50 out of 5"><span data-width="90%">4.50</span></div>
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor adipisicing elit. Prsent quossit sit amet consect adipisicin elit quosit</p>
                    <div class="course-details-bottom mt-15">
                      <ul class="list-inline">
                       <li>Capacity<span>20 kids</span></li>
                       <li>Duration<span>45 min</span></li>
                       <li>Age<span>5y - 6y</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="campaign bg-white maxwidth500 mb-30">
                  <div class="thumb">
                    <img src="{{ asset('images/project/16.jpg') }}" alt="" class="img-fullwidth">
                    <div class="campaign-overlay"></div>
                  </div>
                  <div class="course-details clearfix p-20 pt-15">
                    <h4 class="price-tag">$250</h4>
                    <h3 class="mt-0"><a class="text-theme-color-orange" href="#">Math Classes</a></h3>
                    <ul class="review_text list-inline">
                      <li>
                        <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor adipisicing elit. Prsent quossit sit amet consect adipisicin elit quosit</p>
                    <div class="course-details-bottom mt-15">
                      <ul class="list-inline">
                       <li>Capacity<span>20 kids</span></li>
                       <li>Duration<span>45 min</span></li>
                       <li>Age<span>5y - 6y</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Clients -->
    <section class="clients bg-theme-color-sky">
      <div class="container pt-10 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center owl-nav-top">
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w1.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w2.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w4.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w6.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w4.png') }}"alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w6.png') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}




@endsection