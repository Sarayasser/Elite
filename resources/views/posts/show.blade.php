@extends('layouts.app')
@section('content')
<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6"> 
              <h2 class="text-theme-color-yellow font-36">Blog</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Blog</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Section: Blog -->
    <section>
      <div class="container pt-70 pb-70">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                @if($post->image)
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="{{asset($post->image)}}" alt="" class="img-responsive img-fullwidth"> </div>
                </div>
                @endif                  
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('dddd D')}}
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="#">{{$post->title}}</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  {!!$post->description!!}
                  <form action="{{ route('posts.rate') }}" method="POST">

                    {{ csrf_field() }}
                    <h3>Post Average Rating: {{$post->averageRating ? $post->averageRating :"N/A"}}</h3>
                  
                  


                      <div class="rating">
                        <h4>Give This Post A Rate </h4>
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">

                        <input type="hidden" name="id" required="" value="{{ $post->id }}">

                        <span class="review-no">Rated: ({{$post->averageRating!=null  ? $post->ratings->count():"N/A"}})</span>

                        <br/>

                        <button class="btn btn-success">Submit Review</button>

                    </div>
                  </form>
                  @if(Auth::user())
                    @if (Auth::user()->id == $post->user->id)
                    <a href="{{route('posts.edit', ['course' => $course, 'post' => $post->id])}}" class="btn btn-info">Edit</a>
                    <form action="{{route('posts.destroy', ['course' => $course, 'post' => $post->id])}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                  @endif
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
                <a href="#" class="post-thumb mb-0 pull-left flip pr-20"><img class="img-thumbnail" alt="" src="images/blog/author.jpg"></a>
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
                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment1.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment2.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a>
                        <div class="clearfix"></div>
                        <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="images/blog/comment3.jpg" class="img-thumbnail"></a>
                          <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                            <div class="comment-date">23/06/2014</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                            <a class="replay-icon pull-right text-theme-color-sky" href="#"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</a>
                          </div>
                        </div>
                        <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="images/blog/comment1.jpg" class="img-thumbnail"></a>
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
                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment2.jpg" alt=""></a>
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
  </div>
  <!-- end main-content -->
@endsection
