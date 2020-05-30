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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
          <div class="col-sm-6 col-md-4">
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
                  <p>Lorem ipsum dolor adipisicing elit. Praesent quossit sit amet consect adipisicing elit quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
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
    </section>

    <!-- Divider: Clients -->
    <section class="clients bg-theme-color-sky">
      <div class="container pt-10 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center owl-nav-top">
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w1.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w2.png') }}"alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w4.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w6.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w3.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w4.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w5.png') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('images/clients/w6.png') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection