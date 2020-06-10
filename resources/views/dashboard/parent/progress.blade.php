@extends('layouts.app')

@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <br>
              <h2 class="text-theme-color-red line-bottom">Children
                <button class="btn btn-info" type="button" style="float:right; font-size: 18px; padding: 11px 36px; margin-top: 17px;">
                  <a href="{{route('dashboard.create')}}" style="color:white;"> Add Child  </a>
                </button>  
              </h2>
                @foreach($children as $child)                
                <div class="panel panel-info">
                  <div class="panel-heading" >
                    <h3 class="panel-title" style="font-size:25px;">
                        {{$child->name}}
                    </h3>
                  </div>
                  <div class="panel-body">
                    <div class="image-box-thum">
                        <h3>
                            <span style="color: #a94442; font-size: 25px;"> 
                                Total Points:
                            </span>
                                {{$child->getPoints()}}
                        </h3>
                        <h3>
                            <span style="color: #a94442; font-size: 25px;"> 
                                Badges: 
                            </span>
                            
                            @foreach($child->badges as $badge)
                                <h5> {{$badge ? $badge->name : 'N/A'}}</h5>                            
                                <img alt="{{$badge->name}}" src="{{ asset('images/badges/'.$badge->name.'.jpg') }}" class="img-rounded img-responsive" style="width: 40px" style="height: 40px">   
                            @endforeach
                        </h3>             
                      
                    </div> 
                  </div>                  
                </div>
                @endforeach
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Parent <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                  <li><a href="{{route('dashboard',"parent")}}">Children</a></li>
                  <li class="active"><a href="">Progress and Achievements</a></li>
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