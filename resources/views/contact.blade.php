@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('images/bg/2222.jpg')}}">
        <div class="container pt-150 pb-150">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Contact</h2>
                <ol class="breadcrumb text-left mt-10 white">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Contact</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container pt-50 pb-70">
            <div class="row pt-10">
            <div class="col-md-5">
                <h4 class="mt-0 mb-30 line-bottom">Find Our Location</h4>
                @map([
                    'lat' => 31.1926859,
                    'lng' => 29.9063247,
                    'zoom' => 17,
                    'markers' => [
                        [
                            'title' => 'Elite',
                            'lat' => 31.1926859,
                            'lng' => 29.9063247,
                            'popup' => '<h3>Details</h3><p>Click <a href="/">here</a>.</p>',
                            ],
                    ],
                ])
            </div>
            <div class="col-md-7">
                <h4 class="mt-0 mb-30 line-bottom">Interested in discussing?</h4>
                <!-- Contact Form -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @endif
                <form id="contact_form" name="contact_form" class="" method="post" action="{{route('contact.store')}}" >
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group mb-30  @error('name') has-error @enderror">
                        <input id="name" name="name" class="form-control" type="text" placeholder="Enter Name">
                        @error('name')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group mb-30  @error('email') has-error @enderror">
                        <input id="email" name="email" class="form-control required email" type="email" placeholder="Enter Email">
                        @error('email')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group mb-30  @error('subject') has-error @enderror">
                        <input id="subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                        @error('subject')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group mb-30 @error('phone_number') has-error @enderror">
                        <input id="phone_number" name="phone_number" class="form-control" type="text" placeholder="Enter Phone">
                        @error('phone_number')
                        <span id="helpBlock3" class="help-block">
                                <strong style="color:#a94442;">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="form-group mb-30 @error('message') has-error @enderror">
                    <textarea id="message" name="message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                    @error('message')
                    <span id="helpBlock3" class="help-block">
                            <strong style="color:#a94442;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-dark btn-theme-color-blue btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
                    <button type="reset" class="btn btn-default btn-flat btn-theme-color-red">Reset</button>
                </div>
                </form>
            </div>
            </div>
            <div class="row mt-60">
            
            
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center  border-1px pt-60 pb-60" style="background-color: #FFF	">
                <i class="fa fa-google font-36 mb-10 text-theme-color-red" style="color: #3e65cf"></i>
                <h4>Email</h4>
                <h5 class="text-black">elite.iti40.alex@gmail.com</h5>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center  border-1px pt-60 pb-60" style="background-color: #FFF">
                <i class="fa fa-facebook-square font-36 mb-10 text-theme-color-white" style="color: #4267B2"></i>
                <h4>Like Us on Facebook</h4>
                <a href="https://www.facebook.com/Elite-113792257039055/" target="_blank"><i class="fa fa-thumbs-up fa-lg" style="color: #4267B2"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center  border-1px pt-60 pb-60" style="background-color:#FFF ">
                <i class="fa fa-twitter font-36 mb-10" style="color:#1DA1F2"></i>
                <h4>Follow Us on Twitter</h4>
                <a href="https://twitter.com/elite_iti" target="_blank"><i class="fa fa-heart fa-lg" style="color: red"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center  border-1px pt-60 pb-60" style="background-color: #FFF" >
                <i class="fa fa-phone font-36 mb-10 text-theme-color-red"></i>
                <h4>Call Us</h4>
                <h5 class="text-black">Phone: +20 1550 990 233</h5>
                </div>
            </div>
            
            </div>
        </div>
    </section>



@endsection
