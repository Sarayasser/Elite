@extends('layouts.auth')

@section('content')
<div class="card card-4">
    <div class="card-body">
        <h2 class="title">{{ __('Verify Your Email Address') }}</h2>
        <div class="card-body" style="font-size: 20px;
        text-align: center;
        color: mediumvioletred;">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn--radius-2 btn--blue">{{ __('click here to request another') }}</button>.
            </form>
            <br>
            Need any help?<a href="{{route('contact')}}">contact us</a>
        </div>
    </div>
</div>
@endsection
