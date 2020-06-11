@extends('layouts.app')

@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <br>
              <h2 class="text-theme-color-red line-bottom">Create Child account </h2>
              <form method="POST" class="form-horizontal" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="form-group @error('name') has-error @enderror">
                  <label for="inputName3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    @error('email')
                    <span id="helpBlock3" class="help-block"> 
                            <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group @error('password') has-error @enderror">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                        <span id="helpBlock3" class="help-block"> 
                          <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confim Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirmation Password">
                  </div>
                </div>
                <div class="form-group @error('age') has-error @enderror">
                  <label  class="col-sm-2 control-label">Birthdate</label>
                    <div class="col-sm-10">
                      <div class="input-group date">
                        <input type="text" class="form-control date-picker" name="age" placeholder="birthdate">
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
                <div class="form-group @error('gender') has-error @enderror">
                  <label class="col-sm-2 control-label">Gender</label>
                  <div  class="radio">
                    <label style="margin-left: 15px; margin-right: 15px;">
                      <input type="radio" name="gender" id="male" value="0" {{(old('gender') == 0) ? 'checked' : ''}} >
                        Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="1" {{(old('gender') == 1) ? 'checked' : ''}}>
                        Female
                    </label>
                    @if ($errors->has('gender'))
                        <span id="helpBlock3" class="help-block"> 
                          <strong style="color:#a94442;">{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                  </div>
                      
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info right">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Parent <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                    <li class="active"><a href="{{route('dashboard',"parent")}}">Children</a></li>
                    <li><a href="{{route('dashboard.progress')}}">Progress and Achievements</a></li>
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