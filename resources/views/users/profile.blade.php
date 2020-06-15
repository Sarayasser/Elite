@extends('layouts.app')
@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              @if (session('status'))
                  <div class="alert alert-success" role="alert" >
                      <strong> {{ session('status') }}</strong>
                  </div>
              @endif
              <h2 class="text-theme-color-red line-bottom">Personal Information : </h2>
              <form method="POST" class="form-horizontal" action="{{ route('user.update', Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group @error('name') has-error @enderror">
                  <label for="inputName3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : Auth::user()->name  }}" placeholder="Name">
                    @error('name')
                      <span id="helpBlock3" class="help-block">                      
                        <strong style="color:#a94442;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group @error('email') has-error @enderror">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}">
                    @error('email')
                    <span id="helpBlock3" class="help-block"> 
                            <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group @error('phone_number') has-error @enderror">
                  <label class="col-sm-2 control-label">Phone number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone_number" value="0{{ old('phone_number') ? old('phone_number') : Auth::user()->phone_number }}" >
                    @error('phone_number')
                    <span id="helpBlock3" class="help-block"> 
                            <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group @error('address') has-error @enderror">
                  <label  class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="search"  class="form-control" id="address-input" name="address" value="{{ old('address') ? old('address') : Auth::user()->address }}"/>

                    @error('address')
                    <span id="helpBlock3" class="help-block"> 
                            <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group @error('age') has-error @enderror">
                  <label  class="col-sm-2 control-label">Birthdate</label>
                    <div class="col-sm-10">
                      <div class="input-group date">
                        <input type="text" class="form-control date-picker" name="age" value="{{ old('age') ? old('age') : Auth::user()->age->todatestring()  }}" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                      @if ($errors->has('age'))
                        <span id="helpBlock3" class="help-block"> 
                          <strong style="color:#a94442;">{{ $errors->first('age') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>
                <div class="form-group @error('image') has-error @enderror">
                  <label class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <div class="input-group-icon">
                        <input type="file" name="image" class="form-control" >
                        @if ($errors->has('image'))
                            <span id="helpBlock3" class="help-block"> 
                              <strong style="color:#a94442;">{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                </div>
                @if(Auth::user()->hasRole('instructor'))
                <div class="form-group @error('image') has-error @enderror">
                  <label class="col-sm-2 control-label">CV</label>
                  <div class="col-sm-10">
                    <div class="input-group-icon">
                        <input type="file" name="cv" class="form-control" >
                        @if ($errors->has('cv'))
                            <span id="helpBlock3" class="help-block"> 
                              <strong style="color:#a94442;">{{ $errors->first('cv') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                </div>
                @endif
                <div class="form-group @error('gender') has-error @enderror">
                  <label class="col-sm-2 control-label">Gender</label>
                  <div  class="radio">
                    <label style="margin-left: 15px; margin-right: 15px;">
                      <input type="radio" name="gender" id="male" value="0" {{Auth::user()->gender == 0 ? 'checked' : ''}} >
                        Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="1" {{Auth::user()->gender == 1 ? 'checked' : ''}}>
                        Female
                    </label>
                    @if ($errors->has('gender'))
                        <span id="helpBlock3" class="help-block"> 
                          <strong style="color:#a94442;">{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                  </div>
                      
                </div>
                @if(!Auth::user()->hasRole('instructor'))
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10" >
                        <button type="submit" class="btn btn-info right" style="float:right;">Submit</button>
                      </div>
                    </div>
                  </form>
                @endif
              @if(auth()->user()->hasRole('student'))
                <h2 class="text-theme-color-red line-bottom">Extra Information : </h2>
                  <h3>
                      <span style="color: #429fa9; font-size: 25px;"> 
                          Total Points:
                      </span>
                          {{Auth::user()->getPoints()}}
                  </h3>
                  <h3>
                      <span style="color:#429fa9; font-size: 25px;"> 
                          Badges: 
                      </span>
                      
                      @foreach(Auth::user()->badges as $badge)
                          <h5> {{$badge ? $badge->name : 'N/A'}}</h5>                            
                          <img alt="{{$badge->name}}" src="{{ asset('images/badges/'.$badge->name.'.jpg') }}" class="img-rounded img-responsive" style="width: 40px" style="height: 40px">   
                      @endforeach
                  </h3> 
              @elseif(Auth::user()->hasRole('instructor'))
                <h2 class="text-theme-color-red line-bottom">Extra Information : </h2>
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label" style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Title</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="title" name="title" value="{{  Auth::user()->instructor->title  }}" placeholder="Title">                
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label"  style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Year of Experience</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    
                    <select class="form-control" name="year_of_experience" >
                      @foreach( $years as $year) 
                          <option value="{{ $year }}" @if($year == Auth::user()->instructor->year_of_experience ) selected="selected" @endif >{{$year}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label"  style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Your Experiences</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <select class="form-control js-example-tokenizer" name="experiences[]" multiple="multiple"> 
                          @if (is_array($exps))
                              @foreach ($exps as $exp)
                                  <option value="{{ $exp['experience'] }}" selected="selected">{{ $exp['experience'] }}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label"  style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Facebook</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{  Auth::user()->instructor->facebook  }}" placeholder="Facebook">                
                  </div>
                </div> 
                
                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label" style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Instagram</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{  Auth::user()->instructor->instagram  }}" placeholder="Instagram">                
                  </div>
                </div> 

                <div class="form-group">
                  <label  class="col-sm-2 control-label"  style="color: #5fb6ba;font-size: 17px;font-weight: 600;">Github</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="github" name="github" value="{{  Auth::user()->instructor->github  }}" placeholder="Github">                
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputName3" class="col-sm-2 control-label"  style="color: #5fb6ba; font-size: 17px;font-weight: 600;">Twitter</label>
                  <div class="col-sm-10" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{  Auth::user()->instructor->twitter  }}" placeholder="Twitter">                
                  </div>
                </div> 
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10" >
                    <button type="text" class="btn btn-info right" style="float:right;">Submit</button>
                  </div>
                </div>
              </form>
            
              @endif
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <div class="thumb img-thumbnail">
                  @if( Auth::user()->image)
                    <img class="card-img-top" src="{{asset( Auth::user()->image)}}" width="350px" height="350px" alt="Card image cap">
                  @endif
                </div>
                <a  href="{{ route('password.request') }}">
                  <p style="margin-top: 20px; font-size: 18px; color: #4abae8; text-align: center;">{{ __('reset Your Password ?') }}</p>
                </a>
                @if(auth()->user()->hasRole('instructor'))
                  <div class="form-group" style="text-align: center;">
                      <form action="{{route('user.getCV',Auth::user())}}">
                        <input type="submit" value="Go to your CV" class="btn btn-info right"/>
                      </form>                 
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div> 
          <img alt="" src="{{asset('images/bg/f2.png')}}" class="img-responsive img-fullwidth">
      </div>
    </section>

@endsection
