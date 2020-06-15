@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
      <div class="container pt-150 pb-150">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">post</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">post</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>


    <!-- Section: Post -->
    <section>
        <div class="container pt-70 pb-70">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="blog-posts single-post">
                <article class="post clearfix mb-0">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="{{ asset('images/bg/bg1.jpg') }}" alt="" class="img-responsive img-fullwidth"> </div>
                  </div>
                  <div class="entry-content">
                    <div class="entry-meta media no-bg no-border mt-15 pb-20">
                      <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                        <ul>
                          <li class="font-16 text-white font-weight-600">28</li>
                          <li class="font-12 text-white text-uppercase">Feb</li>
                        </ul>
                      </div>
                      <div class="media-body pl-15">
                        <div class="event-content pull-left flip">
                          <h4 class="entry-title text-white text-uppercase m-0"><a href="#">Post title here</a></h4>
                          <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>
                          <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                        </div>
                      </div>
                    </div>
                    <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <blockquote class="theme-color-sky pt-20 pb-20">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                      <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <div class="mt-30 mb-0">
                      <h5 class="pull-left mt-10 mr-20 text-theme-color-sky">Share:</h5>
                      <ul class="styled-icons icon-circled m-0">
                        <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                        <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                        <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </article>
                <div class="tagline p-0 pt-20 mt-5">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="tags">
                        <p class="mb-0"><i class="fa fa-tags text-theme-color-sky"></i> <span>Tags:</span> Law, Juggement, lawyer, Cases</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="share text-right">
                        <p><i class="fa fa-share-alt text-theme-color-sky"></i> Share</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="author-details media-post">
                  <a href="#" class="post-thumb mb-0 pull-left flip pr-20"><img class="img-thumbnail" alt="" src="{{ asset('images/blog/author.jpg') }}"></a>
                  <div class="post-right">
                    <h5 class="post-title mt-0 mb-0"><a href="#" class="font-18">John Doe</a></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <ul class="styled-icons square-sm m-0">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="comments-area">
                  <h5 class="comments-title">Comments</h5>
                  <ul class="comment-list">
                    <li>
                      <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="{{ asset('images/blog/comment1.jpg') }}" alt=""></a>
                        <div class="media-body">
                          <h5 class="media-heading comment-heading">John Doe says:</h5>
                          <div class="comment-date">23/06/2014</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                          <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a> </div>
                      </div>
                    </li>
                    <li>
                      <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="{{ asset('images/blog/comment2.jpg') }}" alt=""></a>
                        <div class="media-body">
                          <h5 class="media-heading comment-heading">John Doe says:</h5>
                          <div class="comment-date">23/06/2014</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                          <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a>
                          <div class="clearfix"></div>
                          <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="{{ asset('images/blog/comment3.jpg') }}" class="img-thumbnail"></a>
                            <div class="media-body p-20 bg-lighter">
                              <h5 class="media-heading comment-heading">John Doe says:</h5>
                              <div class="comment-date">23/06/2014</div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                              <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a>
                            </div>
                          </div>
                          <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="{{ asset('images/blog/comment1.jpg') }}" class="img-thumbnail"></a>
                            <div class="media-body p-20 bg-lighter">
                              <h5 class="media-heading comment-heading">John Doe says:</h5>
                              <div class="comment-date">23/06/2014</div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                              <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="{{ asset('images/blog/comment2.jpg') }}" alt=""></a>
                        <div class="media-body">
                          <h5 class="media-heading comment-heading">John Doe says:</h5>
                          <div class="comment-date">23/06/2014</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                          <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a> </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="comment-box">
                  <div class="row">
                    <div class="col-sm-12">
                      <h5>Leave a Comment</h5>
                      <div class="row">
                        <form role="form" id="comment-form">
                          <div class="col-sm-6 pt-0 pb-0">
                            <div class="form-group">
                              <input type="text" class="form-control" required name="contact_name" id="contact_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <input type="text" required class="form-control" name="contact_email2" id="contact_email2" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                              <input type="text" placeholder="Enter Website" required class="form-control" name="subject">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <textarea class="form-control" required name="contact_message2" id="contact_message2"  placeholder="Enter Message" rows="7"></textarea>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

@endsection
