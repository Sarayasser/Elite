@extends('layouts.app')
@php
  if (auth()->user() && auth()->user()->hasRole('student')) {
      $event->attended = $event->students->contains(auth()->user());
  }
@endphp
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:400px;" data-bg-img="{{ asset('images/bg/2590.jpg')}}">
        <div class="container pt-150 pb-150"> 
            <!-- Section Content -->
            <div class="section-content">
              <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Event Details</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('events.index')}}">Event</a></li>
                    <li class="active">Event Details</li>
                </ol>  
              </div>
                @if(auth()->user() && !$event->attended && auth()->user()->hasRole('student'))
                <div class="col-md-6 mt-70 pull-right">
                  <a class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20 jquery-postback pull-right" href="{{route('events.attend', $event->id)}}">Attend</a>
                </div>
                @endif
            </div>
        </div>
    </section>


    <section>
      <div class="container pt-40 pb-40">
        <div class="row">
          <div class="col-md-8">
              <h2>{{$event->name}}</h2>
            <!-- <div class="owl-carousel-1col" data-nav="true"> -->
            @if ($event->image)
              <div class="item">
                <img src="{{asset($event->image)}}" alt="" >
              <!-- </div> -->
            </div>
            @else
            <img class="img-fullwidth img-thumbnail" alt="" src="{{ asset('images/bg/32818.jpg')}}">
            @endif
          </div>
          <div class="col-md mt-60" style="float:right;">
            <ul>
              <li>
                <h5>Topics:</h5>
                <p>Children around the world are not enrolled in school</p>
              </li>
              <li>
                <h5>Host:</h5>
                <p>{{$event->user->name}}</p>
              </li>
              <li>
                <h5>Location:</h5>
                <p>{{$event->location}}</p>
              </li>
              <li>
                <h5>Start Date:</h5>
                <p>{{$event->date->format('M')}} {{$event->date->format('d')}} , {{$event->date->format('Y')}}</p>
              </li>
              <li>
                <h5>End Date:</h5>
                <p>{{date('M d , Y', strtotime($event->date. ' + 2 days'))}}</p>
              </li>
              <br>
              @if(Auth::user())
              @if (Auth::user()->id == $event->user_id)
              <li>
              <a href="{{route('events.edit',['event'=>$event->id])}}" class="btn btn-success">Edit Event</a>
              <a href="{{route('events.destroy',['event'=>$event->id])}}" class="btn btn-danger">Delete Event</a>
              </li>
              @endif
              @endif
            </ul>
          </div>
        </div>
        <div class="row mt-40">
          <div class="col-md-6">
            <h3 class="text-theme-color-orange mb-20">Event Description</h3>
            <p>{!!$event->description!!}</p>
          </div>
          <div class="col-md-6">
            <blockquote class="bg-silver-light">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
          </div>
        </div>

      </div>
    </section>


@endsection
