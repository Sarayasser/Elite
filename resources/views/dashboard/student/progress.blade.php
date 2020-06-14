@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-8 blog-pull-right">
            <div class="single-service">
                <br>
                <h2 class="text-theme-color-red line-bottom">progress and achievements
                </h2>
                @if($user->getPoints() != 0)
                <div class="panel panel-info">
                  <div class="panel-heading" >
                    <h3 class="panel-title" style="font-size:25px;">
                        {{$user->name}}
                    </h3>
                  </div>
                  <div class="panel-body">
                    <div class="image-box-thum">
                        <h3>
                            <span style="color: #a94442; font-size: 25px;">
                                Total Points:
                            </span>
                                {{$user->getPoints()}}
                        </h3>
                        @if(!$user->badges->isempty())
                        <h3>
                            <span style="color: #a94442; font-size: 25px;">
                                Badges:
                            </span>

                            @foreach($user->badges as $badge)
                                <h5> {{$badge ? $badge->name : 'N/A'}}</h5>
                                <img alt="{{$badge->name}}" src="{{ asset('images/badges/'.$badge->name.'.jpg') }}" class="img-rounded img-responsive" style="width: 40px" style="height: 40px">
                            @endforeach
                        </h3>
                        @endif
                    </div>
                  </div>
                </div>
                @else
                    <h3>There is no progress or achievements yet</h3>
                @endif
            </div>
            </div>
            <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
                <div class="widget">
                <h3 class="widget-title line-bottom">Student <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                    <ul class="list list-border">
                        <li><a href="{{route('dashboard','student')}}">Courses</a></li>
                        <li class="active"><a href="">Progress and Achievements</a></li>
                        <li><a href="{{route('dashboard.schedule','student')}}">Schedules</a></li>
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
    </section>

@endsection
