@extends('layouts.app')
@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="height:300px;" data-bg-img="{{ asset('images/bg/946.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row mt-50"> 
                <div class="col-md-6 ">
                <h2 class="text-theme-color-yellow font-36">Profile</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Profile</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-4">
              <div class="thumb img-thumbnail">
                    <img height="360px" width="360px" src="{{asset($user->image)}}" alt="">
              </div>
              <div class="col-12" style="float:right;">
                <a class="fa fa-pencil mt-20 mr-10" href="{{route('user.edit',['user'=>$user->id])}}" style="float:right;color:#F08080"> Edit Profile</a>
              </div>
            </div>
            <div class="col-md-8">
              <h4 class="name font-24 mt-0 mb-0">{{$user->name}}</h4>
              <p><cite title="San Francisco, USA"><i class="glyphicon glyphicon-map-marker mr-10"></i>{{$user->address}} 
                        </cite></p>
                        <p><i class="glyphicon glyphicon-envelope mr-10"></i>{{$user->email}}</p>
                        <p><i class="glyphicon glyphicon-user mr-10"></i>
                        @if ($user->gender == 0)
                        Male
                        @else
                        Female
                        @endif
                        </p>
                        <p><i class="glyphicon glyphicon-gift mr-10"></i>
                        @if ($user->age)
                        {{Carbon\Carbon::parse($user->age)->format('Y-m-d')}}</p>
                        @endif
                        <p><i class="glyphicon glyphicon-phone mr-10"></i>{{$user->phone_number}}</p>
            </div>
            <div class="col-md-8">
            <h4> Total Points: {{$user->getPoints()}}</h4>
                        <h4>Badges : </h4>
                        @foreach($badges as $badge)
                        <h5> {{$badge ? $badge->name : 'N/A'}}</h5>
                        {{-- <h4> level:{{$badge ? $badge->level : 'N/A'}}</h4> --}}
                        
                    <img alt="{{$badge->name}}" src="{{ asset('images/badges/'.$badge->name.'.jpg') }}" class="img-rounded img-responsive" style="width: 40px" style="height: 40px">
                        
                        @endforeach
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
                

@endsection