@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="d-inline card-title">Title :- </h5>{{ $post->title }}
            <h5 class="card-text">Description :- </h5>{!! $post->description !!}
        </div>
        @if($post->image)
        <div>
            <img src="{{asset($post->image)}}" class="card-img-top" alt="image">
        </div>
        @endif
    </div>
    <br>
</div>
@endsection