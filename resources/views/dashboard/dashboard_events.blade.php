@extends('dashboard.instructor')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Events</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('dashboard.instructor')}}">Dashboard</a></li>
                    <li class="active">Events</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
    <div class="row">
<div class="container-fluid col ml-10">
<div class="list-group col-md-3 mt-10">
  <a href="{{route('dashboard.instructor')}}" class="list-group-item" ><i class="fa fa-book" style="color:white;"></i> Courses</a>
  <a href="{{route('dashboard.students')}}" class="list-group-item"><i class="fa fa-user"></i> Students</a>
  <a href="{{route('dashboard.students')}}" class="list-group-item" style="background:blue;color:white;"><i class="fa fa-pencil"></i> Events</a>
  <a href="#" class="list-group-item"><i class="fa fa-cog"></i> Schedule</a>
</div>
</div>
<div class="col">
<div class="container p-3 my-3 bg-dark text-white">
    <!-- Section: Events Grid -->
    <section>
        <div class="container pb-30">
          <div class="section-content">
            <div class="row">
            @foreach ($events as $event)
            @if(Auth::user())
            @if (Auth::user()->id == $event->user_id)
              <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="schedule-box maxwidth500 mb-30" data-bg-img="{{ asset('images/pattern/p6.png') }}">
                  <div class="thumb">
                    <img class="img-fullwidth img-thumbnail" alt="" src="{{asset($event->image)}}">
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
                    <p class="mt-10">{!! $event->description !!}</p>
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
              </div>
              @endif
              @endif
              @endforeach
            </div>
          </div>
        </div>
    </section>
</div>
</div>
</div>

@endsection