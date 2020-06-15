@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            @if(auth()->user() && auth()->user()->hasRole('instructor'))
                <embed src="{{asset("storage/".Auth::user()->instructor->cv) }}" width="600" height="600" alt="pdf" />
            @endif
        </div>
        <div> 
            <img alt="" src="{{asset('images/bg/f2.png')}}" class="img-responsive img-fullwidth">
        </div>
    </section>

@endsection
