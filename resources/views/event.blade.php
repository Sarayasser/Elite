@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/946.jpg')}}" >
<<<<<<< HEAD
      <div class="container pt-100 pb-100">
=======
      <div class="container pt-100 pb-50">
>>>>>>> d286cf6936fbe30f7dd8acb58076da498dc82138
            <!-- Section Content -->
            <div class="section-content">
              <div class="row mt-150">
                  <div class="col-md-6">
                  <h2 class="text-theme-color-yellow font-36">Event</h2>
                  <ol class="breadcrumb text-left mt-10 white">
                      <li><a href="{{route('home')}}">Home</a></li>
                      <li class="active">Event</li>
                  </ol>
                  </div>
              </div>
              <div class="col-md-6 mt-70" style="float:right;">
                @if(Auth::user())
                  @if (Auth::user()->hasRole('instructor') || Auth::user()->hasRole('admin'))
                    <a href="{{route('events.create')}}" class="fa fa-plus-circle fa-5x" style="float:right;color:white;"></a>
                  @endif

                @endif
              </div>
            </div>
        </div>
    </section>

    <!-- Section: Events Grid -->
    <section>
        <div class="container pb-30">
          <div class="section-content">
            <div class="row">
            @foreach ($events as $event)
            @php
              if (auth()->user() && auth()->user()->hasRole('student')) {
                  $event->attended = $event->students->contains(auth()->user());
              }
            @endphp
              <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="schedule-box maxwidth500 mb-30" data-bg-img="{{ asset('images/pattern/p6.png') }}">
                  <div class="thumb">
                  @if($event->image)
                    <img class="img-fullwidth img-thumbnail" alt="" src="{{asset($event->image)}}">
                  @else
                  <img class="img-fullwidth img-thumbnail" alt="" src="{{ asset('images/bg/32818.jpg')}}">
                  @endif
                  </div>
                  <div class="schedule-details clearfix p-15 pt-10">
                    <div class="text-center pull-left flip bg-theme-color-sky p-10 pt-5 pb-5 mr-10">
                      <ul>
                        <li class="font-19 text-white font-weight-600 border-bottom ">{{ $event->date->format('d') }}</li>
                        <li class="font-12 text-white text-uppercase">{{ $event->date->format('M') }}</li>
                      </ul>
                    </div>
                  <h4 class="title mt-0"><a href="{{route('event.show',['event',$event])}}">{{$event->name}}</a></h4>
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
                    <div class="clearfix"></div>
                    <p class="mt-10">{!! substr($event->description, 0, 40) !!}</p>
                    <div class="mt-10">
                       <a class="btn btn-default btn-theme-color-sky mt-10 font-16 btn-sm" href="{{route('events.show',['event'=>$event->id])}}">read more</a>
                       @if(Auth::user())
                       @if (Auth::user()->id == $event->user_id)
                       <a href="{{route('events.edit',['event'=>$event->id])}}" class="fa fa-pencil mr-5 btn btn-success btn-lg mt-10" style="float:right;color:white;">
                      </a>
                      <a href="{{route('events.destroy',['event'=>$event->id])}}" class="fa fa-trash mr-5 btn btn-danger btn-lg mt-10 " style="display:inline;float:right;color:white;">
                      </a>
                      @endif
                      @if(!$event->attended && auth()->user()->hasRole('student'))
                      <br><br>
                      <a class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20 jquery-postback center-block" href="{{route('events.attend', $event->id)}}">Attend</a>
                      @endif
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </section>

@endsection
