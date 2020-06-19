@extends('layouts.auth')

@section('content')
<div class="card card-4">
    <div class="card-body">
    @if (session('error'))
        <div class="alert alert-danger" style="font-size: 23px;color: red; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
    @endif
        {{-- <h2 class="title">{{ __('Login Form') }}</h2> --}}
        <h2 class="title">Login Form</h2>
        @if (session('danger'))
            <div class="alert alert-danger" role="alert" style="margin-bottom:20px;">
                <strong style="font-size: 16px; color: #e35c5c;"> {{ session('danger') }}</strong>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert" style="margin-bottom:20px;">
                <strong style="font-size: 16px; color: green;"> {{ session('status') }}</strong>
            </div>
        @endif
            <form method="POST" action="{{ route('login') }}">
            @csrf

                <div class="input-group">
                    {{-- <label class="label">{{ __('E-Mail Address') }}</label> --}}
                    <label class="label">E-Mail Address</label>
                    <input id="email" type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                    {{-- <label class="label">{{ __('Password') }}</label> --}}
                    <label class="label">Password </label>
                    <input id="password" type="password" class="input--style-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group">
                    <label class="radio-container m-r-45">{{ __('Remember Me') }}</label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <button class="btn btn--radius-2 btn--blue" style="margin-bottom: 20px;" type="submit">{{ __('Login') }}</button>
                        <br>
                        @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                </div>
                <div class="row row-space" style="margin-top:15px;">
                    <a href="{{ route('users') }}">{{ _("Register if you don't have an account") }}</a>
                </div>
            </form>
            <br>
            <hr>
            <br>
    <div class="row">
        <div class="col">
            <button class="btn btn--radius-2" style="margin-bottom: 20px; background: darkred; padding:0 18px;">
                <a class="fa fa-google fa-2x" href="{{ route('login.provider', 'google') }}" style="color: #ffffff;font-size: 1.4em;text-align: left;"> Login With Google</a>
            </button>
        </div>
        <div class="col">
            <button class="btn btn--radius-2" style="margin-bottom: 20px; padding:0 18px;background: #0b589b;margin-left: 5px;">
                <a class="fa fa-facebook-square fa-2x" href="{{ route('login.provider', 'facebook') }}" style="color: #ffffff;font-size: 1.4em;text-align: left;"> Login With Facebook</a>
            </button>    
        </div>
    </div>
    </div>
</div>
@endsection
