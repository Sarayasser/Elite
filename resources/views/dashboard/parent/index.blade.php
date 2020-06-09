@extends('layouts.app')

@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <br>
              <h2 class="text-theme-color-red line-bottom">Children</h2>
                @foreach($children as $child)                
                <div class="panel panel-info">
                  <div class="panel-heading" style="padding:22px 15px; ">
                    
                    <h3 class="panel-title" style="font-size:25px;">
                        {{$child->name}}
                        <button class="btn btn-danger" type="button" style="float:right; font-size:15px;">
                        {{-- <a href="{{route('dashboard.login',['email'=> $child->email,'slug' => "parent"])}}"> Log in </a> --}}
                        </button>
                    </h3>
                    
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
                  <li class="active"><a href="">Children</a></li>
                    <li><a href="#">Progress</a></li>
                    <li><a href="#">Achievements</a></li>
                    <li><a href="#">Schedules</a></li>
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