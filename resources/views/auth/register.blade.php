@extends('layouts.auth')

@section('content')
<div class="card card-4">
    <div class="card-body">
        <h2 class="title">{{ucfirst($slug)}} Registration Form</h2>
        <form method="POST" action="{{ route('post.register') }}" enctype="multipart/form-data">
            @csrf
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="input--style-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="input--style-4 @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="input--style-4" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">Birthdate</label>
                        <div class="input-group-icon">
                            <input class="input--style-4 js-datepicker" type="text" name="age" value="{{ old('age') }}">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            @if ($errors->has('age'))
                                    <span class="invalid-feedback">
                                        <strong style="color:red;">{{ $errors->first('age') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                @if($slug === "instructor")
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('CV') }}</label>
                        <div class="input-group-icon">
                            <input type="file" name="cv" class="{{ $errors->has('cv') ? ' is-invalid' : '' }}" >
                            @if ($errors->has('cv'))
                                    <span class="invalid-feedback">
                                        <strong style="color:red;">{{ $errors->first('cv') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Image') }}</label>
                        <div class="input-group-icon">
                            <input type="file" name="image" class="{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                            @if ($errors->has('image'))
                                    <span class="invalid-feedback">
                                        <strong style="color:red;">{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                                
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">Gender</label>
                        <div class="p-t-10">
                            <label class="radio-container m-r-45">Male
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio"  name="gender" value="0" {{(old('gender') == 0) ? 'checked' : ''}}>

                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container">Female
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio"  name="gender" value="1" {{(old('gender') == 1) ? 'checked' : ''}} >
                                <span class="checkmark"></span>
                            </label>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback">
                                    <strong style="color:red;">{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Phone Number') }}</label>
                        <input type="text" class="input--style-4{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback">
                                <strong style="color:red;">{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">{{ __('Address') }}</label>
                        <input type="text" class="input--style-4{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong style="color:red;">{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                @if($slug === "instructor")
                    <input type="hidden" id="role" name="role" value="0">
                @elseif($slug === "parent")
                    <input type="hidden" id="role" name="role" value="1">
                @elseif($slug === "student")
                    <input type="hidden" id="role" name="role" value="2">
                @endif
                @if ($errors->has('role'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
                
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                    
                </div>
                <div class="row row-space">
                    <div class="col-2">
                        <a href="{{ route('login') }}">{{ _('login') }}</a>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
