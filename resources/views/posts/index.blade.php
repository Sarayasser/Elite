@extends('layouts.app')
@php
  $course = $post->course;
@endphp
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Course posts</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('courses.show', $course->id)}}">Course Details</a></li>
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
                      @if($post->image)
                      <div class="entry-header">
                        <div class="post-thumb thumb"> <img src="{{asset($post->image)}}" alt="" class="img-responsive img-fullwidth"> </div>
                      </div>
                      @endif
                      <div class="entry-content p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-color-sky pt-5 pr-15 pb-5 pl-15">
                            <ul>
                            {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('dddd D')}}
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">{{$post->title}}</a></h4>
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-color-sky"></i> 214 Comments</span>                       
                              <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-color-sky"></i> 895 Likes</span>
                            </div>
                          </div>
                        </div>
                        <p>{!! $post->description !!}</p>
                        <a href="{{route('posts.show', ['course' => $course->id, 'post' => $post->id])}}" class="btn-read-more">Read more</a>
                        @if(Auth::user())
                          @if (Auth::user()->id == $post->user->id)
                          <br>
                          <br>
                          <a href="{{route('posts.edit', ['course' => $course, 'post' => $post->id])}}" class="btn btn-info">Edit </a>
                          <form action="{{route('posts.destroy', ['course' => $course, 'post' => $post->id])}}" method="POST" style="display: inline">
                          @csrf
                          @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          @endif
                        @endif
                        <div class="clearfix"></div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-md-12">

                  <a href="{{route('posts.read', ['course' => $course, 'post' => $post->id])}}" class="jquery-postback btn btn-info pull-right">
                    Mark as read
                    <img src="{{asset('images/check.png')}}" alt="" width=30>
                  </a>
                  @if($has_next)
                  <nav>
                    <ul class="pagination theme-color-sky">
                      <li> <a aria-label="Next" href="{{route('posts.index', ['course' => $course])}}"> <span aria-hidden="true">Next »</span> </a> </li>
                    </ul>
                  </nav>
                  @endif
                </div>
              </div>
            </div>  
          </div>
        </div>
    </section>

@endsection