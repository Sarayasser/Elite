@extends('layouts.app')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:300px;" data-bg-img="{{ asset('images/bg/946.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-50">
                <div class="col-md-6 ">
                <h2 class="text-theme-color-yellow font-36">Events</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Events</li>
                </ol>
                </div>
                <div class="col-md-6 mt-50" style="float:right;">
            @if(Auth::user())
                @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('instructor'))
                <a href="{{route('events.create')}}" class="fa fa-plus-circle fa-5x" style="float:right;color:white;"></a>
                @endif
                @endif
            </div>
            </div>
            </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-9 blog-pull-right mr-30">
        <div class="container pb-30">
          <div class="section-content">
            <div class="row mt-60" style="width:60rem;">

            @foreach ($events as $event)
            <div class="col-md-4">
            @if(Auth::user())
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
                    <h4 class="title mt-0"><a href="#">{{$event->name}}</a></h4>
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
                      @endif
                    </div>
                  </div>
                </div>
              @endif
              </div>
              @endforeach

          </div>
          </div>
          </div>
          </div>
          <div class="col-sm-2">
            <div class="sidebar sidebar-left mt-sm-30 mr-5">
              <div class="widget blank" style="float:left;">
                <h3 class="widget-title line-bottom">Instructor <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border" style="width:15rem;">
                    <li><a href="{{route('dashboard','instructor')}}">Courses</a></li>
                    <li><a href="{{route('dashboard.students',"instructor")}}">Students</a></li>
                    <li class="active"><a href="{{route('dashboard.events',"instructor")}}">Events</a></li>
                    <li><a href="{{route('dashboard.schedule',"instructor")}}">Schedules</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
          <img alt="" src="images/bg/f2.png" class="img-responsive img-fullwidth">
      </div>
    </div>
    </section>

@endsection
