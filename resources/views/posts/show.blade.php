@extends('layouts.app')
@section('content')
<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/2188.jpg')}}">
      <div class="container pt-150 pb-150">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-theme-color-yellow font-36">{{$post->title}}</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('courses.show', $course)}}">Course Details</a></li>
                <li class="active">Post</li>
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
              {!! $post->video_html !!}
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
                        <h4 class="entry-title text-white text-uppercase m-0"><a>{{$post->title}}</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> {{$post->comments->count()}} Comments</span>
                      </div>
                    </div>
                  </div>
                  {!!$post->description!!}
                  <form action="{{ route('posts.rate') }}" method="POST">

                    {{ csrf_field() }}
                    <h3>Post Average Rating: {{$post->averageRating ? $post->averageRating :"N/A"}}</h3>



                    @if(auth()->user() && auth()->user()->hasRole('student') && $course->enrolled)
                      <div class="rating">
                        <h4>Give This Post A Rate </h4>
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">

                        <input type="hidden" name="id" required="" value="{{ $post->id }}">

                        <span class="review-no">Rated: ({{$post->averageRating!=null  ? $post->ratings->count():"N/A"}})</span>

                        <br/>

                        <button class="btn btn-success">Submit Review</button>

                    </div>
                    @endif
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
                </div>
              </article>

              <div class="author-details media-post">
                <a class="post-thumb mb-0 pull-left flip pr-20"><img class="img-thumbnail" alt="" src="{{asset($post->user->image)}}" width="50px"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-0"><a class="font-18">{{$post->user->name}}</a></h5>
                </div>
                <div class="clearfix"></div>
              </div>
              @if($comments)
              <div class="comments-area">
                <h5 class="comments-title">Comments</h5>
                <ul class="comment-list">
                @foreach($comments as $comment)
                  <li>
                    <div class="media comment-author"> <a class="media-left pull-left flip"><img class="img-thumbnail" src="{{asset($comment->user->image)}}" width="50px" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">{{$comment->user->name}} says:</h5>
                        @if(Auth::user() && Auth::id() == $comment->user->id)
                        <form method="POST" action="{{route('comments.destroy', ['post' => $post->id, 'comment' => $comment->id])}}">
                          @csrf
                          @method('DELETE')
                          <button class="pull-right" type="submit" style="border: none; background-color: #fff;"><i class="fa fa-trash text-theme-color-red"></i></button>
                        </form>
                        @endif
                        <div class="comment-date">{{\Carbon\Carbon::parse($comment->created_at)->format('d/m/yy')}}</div>
                        <p>{{$comment->body}}</p>
                        <form method="POST" action="{{route('comments.store', $post->id)}}">
                          @csrf
                          <div class="col-sm-6">
                            <div class="form-group input-group-sm">
                              <input type="text" name="body" placeholder="Reply .." class="form-control">
                              <input type="hidden" name="commentable_type" value="App\Comment">
                              <input type="hidden" name="commentable_id" value="{{$comment->id}}">
                              <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="replay-icon text-theme-color-sky" style="border: none; background-color: #fff;"> <i class="fa fa-commenting-o text-theme-color-sky"></i> Replay</button>
                          </div>
                        </form>
                        <div class="clearfix"></div>
                        @foreach($comment->replies as $reply)
                        <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img class="img-thumbnail" src="{{asset($reply->user->image)}}" width="50px" alt=""></a>
                          <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">{{$reply->user->name}} says:</h5>
                            @if(auth()->user() && auth()->id() == $reply->user->id)
                            <form method="POST" action="{{route('comments.destroy', ['post' => $post->id, 'comment' => $reply->id])}}">
                              @csrf
                              @method('DELETE')
                              <button class="pull-right" type="submit" style="border: none; background-color: #f7f7f7;"><i class="fa fa-trash text-theme-color-red"></i></button>
                            </form>
                            @endif
                            <div class="comment-date">{{\Carbon\Carbon::parse($reply->created_at)->format('d/m/yy')}}</div>
                            <p>{{$reply->body}}</p>
                          </div>
                        </div>
                        @endforeach
                        <br>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if(auth()->user())
              <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <h5>Leave a Comment</h5>
                    <div class="row">
                      <form method="POST" action="{{route('comments.store', $post->id)}}">
                        @csrf
                        <div class="col-sm-6">
                          <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Enter your comment" rows="2"></textarea>
                            <input type="hidden" name="commentable_type" value="App\Models\Post">
                            <input type="hidden" name="commentable_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <br>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
