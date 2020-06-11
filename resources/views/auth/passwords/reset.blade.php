@extends('layouts.auth')

@section('content')
<div class="card card-4">
    <div class="card-body">
        <h2 class="title">{{ __('Reset Password') }}</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group">
                    <label class="label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>   

                <div class="input-group row">
                    <label class="label" for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="input--style-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label class="label" for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="input--style-4" name="password_confirmation" required autocomplete="new-password">
                </div>
                <br> 
                <div class="row row-space">
                    <div class="col-3">
                        <button class="btn btn--radius-2 btn--blue" type="submit"> {{ __('Reset Password') }}</button>
                        <br>
                    </div>
                </div>
              
            </form>
        </div>
    </div>
</div>
@endsection
