@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row"> 
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Calender</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Calender</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- divider: what makes us different -->
    <section class="divider parallax layer-overlay overlay-white-9" data-parallax-ratio="0.7" data-bg-img="{{ asset('images/bg/bg2.jpg')}}">
        <div class="container">
          <div class="section-content text-center">
            <div class="row">
              <div class="col-md-12">
                <div id="full-event-calendar"></div>
                <!-- JS | Calendar Event Data -->
                <script src="js/calendar-events-data.js"></script>
              </div>
            </div>
          </div>
        </div>
    </section>



@endsection