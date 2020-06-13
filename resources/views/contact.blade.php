@extends('layouts.app')

@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('images/bg/2222.jpg')}}">
        <div class="container pt-70 pb-20">
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
                {{-- <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJwT7Q65TD9RQRS_NPhF3_yxY&key=AIzaSyAz0rNzjWeNQs9CqB6FRv3aPVxYpdeHS8U" allowfullscreen></iframe> --}}
                <!-- Google Map HTML Codes --><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5456.163483134849!2d144.95177475051227!3d-37.81589041361766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sbd!4v1556130803137!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                <div class="contact-info text-center bg-theme-color-sky border-1px pt-60 pb-60">
                <i class="fa fa-phone font-36 mb-10 text-theme-color-red"></i>
                <h4>Call Us</h4>
                <h6 class="text-white">Phone: +262 695 2601</h6>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center bg-theme-color-yellow border-1px pt-60 pb-60">
                <i class="fa fa-map-marker font-36 mb-10 text-theme-color-red"></i>
                <h4>Address</h4>
                <h6 class="text-white">121 King Street, Australia</h6>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center bg-theme-color-green border-1px pt-60 pb-60">
                <i class="fa fa-envelope font-36 mb-10 text-theme-color-red"></i>
                <h4>Email</h4>
                <h6 class="text-white">you@yourdomain.com</h6>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="contact-info text-center bg-theme-color-lemon border-1px pt-60 pb-60">
                <i class="fa fa-fax font-36 mb-10 text-theme-color-red"></i>
                <h4>Fax</h4>
                <h6 class="text-white">(020) 123 4567</h6>
                </div>
            </div>
            </div>
        </div>
    </section>



@endsection
