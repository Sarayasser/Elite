@extends('layouts.app')

@section('content')
    
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('images/bg/946.jpg')}}">
      <div class="container pt-150 pb-150">
        <!-- Section Content -->
          <div class="section-content">
          <div class="row">
              <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Instructor Details</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('instructors.index')}}">Instructor</a></li>
                    <li class="active">Instructor Details</li>
                </ol>
              </div>
          </div>
          </div>
      </div>
  </section>
  

    <!-- Section: Experts Details -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-4">
              <div class="thumb">
                @if($instructor->user->image)
                    <img height="360px" width="360px" src="{{asset($instructor->user->image)}}" alt="">                     
                @else
                    @if($instructor->user->gender == "1")
                      <img height="360px" width="360px" src="{{ asset('images/team/team-details.jpg')}}" alt="">
                    @else
                      <img height="360px" width="360px" src="{{ asset('images/team/team6.jpg') }}" alt="">
                    @endif
                @endif
              </div>
            </div>
            <div class="col-md-8">
              <h4 class="name font-24 mt-0 mb-0">{{$instructor->user->name}}</h4>
              <h5 class="mt-5 text-theme-color-red">{{$instructor->title}}</h5>
                <p>{{$instructor->bio}}</p>
              @if(Auth::user())
                @if(Auth::user()->hasRole('parent')||Auth::user()->hasRole('student'))
                  <form action="{{ route('instructors.rate') }}" method="POST">
                    {{ csrf_field() }}
                    <h3>Instructor Average Rating: {{$instructor->averageRating ? $instructor->averageRating :"N/A"}}</h3>
                      <div class="rating">
                        <h4>Give Instructor A Rate </h4>
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $instructor->userAverageRating }}" data-size="xs">
                        <input type="hidden" name="id" required="" value="{{ $instructor->id }}">
                        <span class="review-no">Rated: ({{$instructor->averageRating!=null  ? $instructor->ratings->count():"N/A"}})</span>
                        <br/>
                        <button class="btn btn-success">Submit Review</button>
                    </div>
                  </form>
                @endif
              @endif
              <ul class="styled-icons icon-dark icon-theme-color-red icon-sm mt-15 mb-0">
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
          <div class="row mt-30">
            <div class="col-md-4">
              <h4 class="line-bottom">About Me:</h4>
              <div class="volunteer-address">
                <ul>
                  <li>
                    @if($instructor->experiences )
                    @if(!$instructor->experiences->isempty())
                    <div class="bg-theme-color-red media border-bottom p-15 mb-20">
                      <div class="media-left">
                        <i class="pe-7s-pen text-theme-color-blue font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">Experiences:</h5>
                        <p class="text-white">
                          @foreach($instructor->experiences as $exp)
                            {{$exp->experience}} <br>
                          @endforeach
                        </p>
                      </div>
                    </div>
                    @endif
                    @endif
                  </li>
                  <li>
                    <div class="bg-theme-color-sky media border-bottom p-15 mb-20">
                      <div class="media-left">
                        <i class="fa fa-map-marker text-theme-color-blue font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">Address:</h5>
                        <p class="text-white">{{$instructor->user->address}}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="bg-theme-color-green media border-bottom p-15">
                      <div class="media-left">
                        <i class="fa fa-phone text-theme-color-blue font-24 mt-5"></i>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 mb-0">Contact:</h5>
                      <p class="text-white"><span>Phone:</span> 0{{$instructor->user->phone_number}}<br><span>Email:</span> {{$instructor->user->email}}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="clearfix">
                <h4 class="line-bottom">Quick Contact:</h4>
              </div>
              <form id="contact_form" name="contact_form" class="contact-form-transparent" method="post" action="{{route('contact.store')}}" >
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group  @error('name') has-error @enderror">
                      <input id="name" name="name" class="form-control" type="text"  required="" placeholder="Enter Name">
                      @error('name')
                      <span id="helpBlock3" class="help-block">
                              <strong style="color:#a94442;">{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group @error('email') has-error @enderror">
                        <input id="email" name="email" class="form-control required email" type="email" placeholder="Enter Email" required="">
                        @error('email')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30  @error('subject') has-error @enderror">
                        <input id="subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                        @error('subject')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-30 @error('phone_number') has-error @enderror">
                        <input id="phone_number" name="phone_number" class="form-control" type="text" placeholder="Enter Phone">
                        @error('phone_number')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group mb-30 @error('message') has-error @enderror">
                      <textarea id="message" name="message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                      @error('message')
                      <span id="helpBlock3" class="help-block">
                              <strong style="color:#a94442;">{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <input type="hidden" value={{$instructor->user->email}} name="instructor">
                <div class="col-sm-12">
                  <div class="form-group">
                    <button data-loading-text="Please wait..." class="btn btn-flat btn-dark btn-theme-color-red mt-5" type="submit">Send your message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection