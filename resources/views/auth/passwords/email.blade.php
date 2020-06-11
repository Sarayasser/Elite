@extends('layouts.auth')

@section('content')
<div class="card card-4">
    <div class="card-body">
        <h2 class="title">{{ __('Reset Password') }}</h2>
            @if (session('status'))
                <div class="alert alert-success" role="alert" >
                    <strong  style="color:green;"> {{ session('status') }}</strong>
                </div>
            @endif
        <br>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group">
                <label class="label">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color:red;">{{ $message }}</strong>
                    </span>
                @enderror
            </div>  
            <div class="row row-space">
                <div class="col-3">
                    <button class="btn btn--radius-2 btn--blue" type="submit">{{ __('Send Password Reset Link') }}</button>
                    <br>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
