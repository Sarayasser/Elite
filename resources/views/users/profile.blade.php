@extends('layouts.app')
@section('content')
<h3 class="ml-50">Profile</h3>
<div class="container mt-30">
    <div class="row">
    <div class="col-sm-6 col-md-8" style="float:right;">
        <a class="fa fa-pencil mt-20 mr-10" href="{{route('user.edit',['user'=>$user->id])}}" style="float:right;color:#F08080"></a>
        </div>
        <div class="col-12 ml-50">
            <div class="well well-md">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{asset('/'.$user->image)}}" alt="" class="img-rounded img-responsive img-thumbnail" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>{{$user->name}}</h4>
                        <h4> Total Points: {{$user->getPoints()}}</h4>
                        <h4>Badges : </h4>
                        @foreach($badges as $badge)
                        <h5> {{$badge ? $badge->name : 'N/A'}}</h5>
                        {{-- <h4> level:{{$badge ? $badge->level : 'N/A'}}</h4> --}}
                        
                    <img alt="{{$badge->name}}" src="{{ asset('images/badges/'.$badge->name.'.jpg') }}" class="img-rounded img-responsive" style="width: 40px" style="height: 40px">
                        
                        @endforeach
                        <p><cite title="San Francisco, USA"><i class="glyphicon glyphicon-map-marker mr-10"></i>{{$user->address}} 
                        </cite></p>
                        <p><i class="glyphicon glyphicon-envelope mr-10"></i>{{$user->email}}</p>
                        <p><i class="glyphicon glyphicon-user mr-10"></i>
                        @if ($user->gender == 0)
                        Male
                        @else
                        Femail
                        @endif
                        </p>
                        <p><i class="glyphicon glyphicon-gift mr-10"></i>
                        @if ($user->age)
                        {{Carbon\Carbon::parse($user->age)->format('Y-m-d')}}</p>
                        @endif
                        <p><i class="glyphicon glyphicon-phone mr-10"></i>{{$user->phone_number}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
</div>
    </div>
</div>
      
                

@endsection