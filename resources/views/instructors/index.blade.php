@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('images/bg/2222.jpg')}}">
        <div class="container pt-150 pb-150">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Instructors</h2>
                <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Instructors</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Section: Team -->
    <section id="team">
      <div class="container">
        <div class="row mtli-row-clearfix">
         <div class="team-members">
          
            @foreach($instructors as $instructor)
              <div class="col-xs-12 col-sm-6 col-md-3 sm-text-center mb-sm-15">
                <div class="team-member maxwidth400">
                  <div class="team-thumb">
                    <a href={{route('instructors.show',['instructor'=> $instructor])}}>
                      @if($instructor->user->image)
                          <img class="img-fullwidth mt-15" height="390px" src="{{$instructor->user->image}}" alt="">                     
                      @endif
                    </a>
                  </div>
                  <div class="team-details bg-theme-color-sky text-center pt-20 pb-5" style="width:260.5px;height:153.6px;">
                    <div class="member-biography">
                        <h3 class="mt-0 text-white">{{$instructor->user->name}}</h3>
                        <p class="mb-0 text-white">{{$instructor->title}}</p>
                    </div>
                    <ul class="styled-icons icon-dark icon-circled icon-theme-color-red pt-5">
                      @if($instructor->facebook)
                          <li><a href="{{$instructor->facebook}}"><i class="fa fa-facebook text-white"></i></a></li>
                      @endif
                      @if($instructor->github)
                          <li><a href="{{$instructor->github}}"><i class="fa fa-github text-white"></i></a></li>
                      @endif
                      @if($instructor->instagram)
                          <li><a href="{{$instructor->instagram}}"><i class="fa fa-instagram text-white"></i></a></li>
                      @endif
                      @if($instructor->twitter)
                          <li><a href="{{$instructor->twitter}}"><i class="fa fa-twitter text-white"></i></a></li>
                      @endif
                        
                    </ul>
                </div>
                </div>
              </div>
            @endforeach
            
         </div>
        </div>
      </div>
      <div>
        <img alt="" src="{{asset('images/bg/f2.png')}}" class="img-responsive img-fullwidth">
      </div>
    </section>



@endsection