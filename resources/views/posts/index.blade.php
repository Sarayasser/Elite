@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Courses posts</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Courses posts</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row ">
            <div class="col-md-10 col-md-offset-1">
              <div class="blog-posts">
                <div class="col-md-12">
                  <div class="row list-dashed">
                    <article class="post clearfix mb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb thumb"> 
                          <img src="{{ asset('images/blog/bc3.jpg') }}" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                      </div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Post title here</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb thumb"> 
                          <img src="https://placehold.it/900x450" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                      </div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Image Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb thumb"> 
                          <img src="https://placehold.it/900x450" alt="" class="img-responsive img-fullwidth"> 
                        </div>
                      </div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Text Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-50 pb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <iframe src="http://player.vimeo.com/video/114959015?title=0&amp;byline=0&amp;portrait=0" width="360" height="205" allowfullscreen>
                          </iframe>
                        </div>
                      </div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Vimeo Video Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-50 pb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <iframe width="600" height="340"
                          src="http://www.youtube.com/embed/oIDqz2BrVec?autoplay=0" allowfullscreen>
                          </iframe>
                        </div>
                      </div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Youtube Video Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-50 pb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <!-- Portfolio Gallery Grid -->
                          <div class="gallery-isotope grid-5 masonry gutter-small clearfix" data-lightbox="gallery">
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 1"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item wide">
                              <a href="http://placehold.it/800x600" data-lightbox="gallery-item" title="Title Here 2"><img src="http://placehold.it/800x600" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 3"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x600" data-lightbox="gallery-item" title="Title Here 4"><img src="http://placehold.it/400x600" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x600" data-lightbox="gallery-item" title="Title Here 5"><img src="http://placehold.it/400x600" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 6"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 6"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 6"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 6"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                            
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item">
                              <a href="http://placehold.it/400x300" data-lightbox="gallery-item" title="Title Here 6"><img src="http://placehold.it/400x300" alt=""></a>
                            </div>
                            <!-- Portfolio Item End -->
                          </div>
                          <!-- End Portfolio Gallery Grid -->
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Gallery Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-50 pb-30 bg-lighter">
                      <div class="entry-header">
                      </div>
                      <div class="clearfix"></div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Quote Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo eligendi quibusdam doloremque necessitatibus doloribus blanditiis, praesentium ex error aliquid? Corporis dolores consequuntur cupiditate.</p>
                          <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix mb-50 pb-30 bg-lighter">
                      <div class="entry-header">
                        <div class="post-thumb">
                          <div class="owl-carousel-1col">
                            <div class="item">
                              <img src="https://placehold.it/900x500" alt="">
                            </div>
                            <div class="item">
                              <img src="https://placehold.it/900x500" alt="">
                            </div>
                            <div class="item">
                              <img src="https://placehold.it/900x500" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">28</li>
                              <li class="font-12 text-white text-uppercase">Feb</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Images Carousel Post</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                        <a href="#" class="btn-read-more">Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </article>
  
                    <article class="post clearfix pb-30">
                      <div class="clearfix"></div>
                      <div class="entry-content">
                        <a class="post-link text-center text-white bg-theme-color-sky display-block font-20 p-30" href="#">
                          kodesolution.com<br><span class="font-13">http://kodesolution.com</span>
                        </a>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-md-12">
                  <nav>
                    <ul class="pagination theme-color-sky">
                      <li> <a aria-label="Previous" href="#"> <span aria-hidden="true">«</span> </a> </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">...</a></li>
                      <li> <a aria-label="Next" href="#"> <span aria-hidden="true">»</span> </a> </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>  
          </div>
        </div>
    </section>

@endsection