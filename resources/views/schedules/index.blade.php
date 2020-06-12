@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/946.jpg')}}" >
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Schedule</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Event</li>
                </ol>
                </div>
            </div>


            </div>
        </div>
    </section>

@endsection
