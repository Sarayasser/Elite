@extends('layouts.app')
@php
    if (auth()->user() && auth()->user()->hasRole('student')) {
        $course->enrolled = $course->students->contains(auth()->user());
    }
@endphp
@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/bg/bg3.jpg')}}">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                <h2 class="text-theme-color-yellow font-36">Course details</h2>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('courses.index')}}">Courses </a></li>
                    <li class="active">Course details</li>
                </ol>
                @if(Auth::user())
                  @if(Auth::user()->hasRole('instructor') && !$course->enrolled && $course->capacity > 0)
                  <form method="POST" action="{{route('courses.enroll', $course->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-colored btn-lg btn-theme-color-red pl-20 pr-20">Enroll</button>
                  </form>
                  @endif
                  @if($course->capacity <= 0)
                    <p class="text-danger">This course is not available at the moment</p>
                  @endif
                @endif
                </div>
                <div class="col-md-6 mt-70" style="float:right;">
                @if(Auth::user())
                  @if (Auth::user()->hasRole('instructor') || Auth::user()->hasRole('admin'))
                  <a href="{{route('posts.create', ['course' => $course])}}" class="fa fa-plus-circle fa-5x" style="float:right;color:white;"></a>
                  @endif
                  @if (auth()->user()->hasRole('student') && $course->enrolled)
                  <a href="{{route('posts.index', ['course' => $course])}}" class="fa fa-play fa-5x" style="float:right;color:white;"></a>
                  @endif
                  @if (Auth::user()->hasRole('instructor') || Auth::user()->hasRole('admin'))
                  <a href="{{route('schedule.create', ['course' => $course])}}" class="fa fa-calendar fa-5x mr-20" style="float:right;color:white;"></a>
                  @endif
                @endif
                </div>
            </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
          <div class="row">
            <div class="col-md-8 blog-pull-right">
              <div class="single-service">
                <img src="{{asset($course->image)}}" alt="" class="img-fullwidth" >
                <h2 class="text-theme-color-red line-bottom">{{$course->name}}</h2>
                <h4 class="mt-0"><span class="text-theme-color-red">Price :</span> $ {{$course->price}}</h4>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated {{$course->averageRating}} out of 5"><span data-width="{{$course->averageRating*20}}%">{{$course->averageRating}}</span></div>
                    </li>
                  </ul>
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo unde, <span class="text-theme-color-red">{{$course->name}}</span> corporis dolorum blanditiis ullam officia <span class="text-theme-color-red">our kindergarten </span>natus minima fugiat repellat! Corrupti voluptatibus aperiam voluptatem. Exercitationem, placeat, cupiditate.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore suscipit, inventore aliquid incidunt, quasi error! Natus esse rem eaque asperiores eligendi dicta quidem iure, excepturi doloremque eius neque autem sint error qui tenetur, modi provident aut, maiores laudantium reiciendis expedita. Eligendi</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore voluptatem officiis quod animi possimus a, iure nam sunt quas aperiam non recusandae reprehenderit, nesciunt cumque pariatur totam repellendus delectus? Maxime quasi earum nobis, dicta, aliquam facere reiciendis, delectus voluptas, ea assumenda blanditiis placeat dignissimos quas iusto repellat cumque.</p>
                <h3 class="line-bottom mt-20 mb-20 text-theme-color-red">Course Information</h3>
                <table class="table table-bordered">
                  <tr>
                    <td class="text-center font-16 font-weight-600 bg-theme-color-blue text-white" colspan="4">Details For {{$course->name}}</td>
                  </tr>
                  <tbody>


                    <tr> <td><i class="fa fa-calendar text-theme-color-red pr-20"></i>Start Date</td> <td>{{$course->schedule ?\Carbon\Carbon::parse($course->schedule->start_date)->format('d/m/yy')  : 'N/A'}}</td> </tr>


                    <tr> <td class="bg-theme-color-yellow text-white"><i class="fa fa-birthday-cake text-theme-color-blue pr-20"></i>Years Old</td> <td class="bg-theme-color-green text-white">{{$course->age}}-{{$course->age+1}} Years</td> </tr>
                    <tr> <td><i class="fa fa-users text-theme-color-red pr-20"></i>Class Size</td> <td>{{$course->capacity}} Students</td> </tr>
                    <tr> <td class="bg-theme-color-red text-white"><i class="fa fa-user text-theme-color-yellow pr-20"></i>Instructor</td> <td class="bg-theme-color-sky text-white">{{$course->instructor->name}}</td> </tr>
                    <tr> <td class=" text-theme-color-red pr-20"><i class="fa fa-fighter-jet text-theme-color-red pr-20"></i>Coures Duration</td> <td>{{$course->duration}}-{{$course->duration+2}} Month</td> </tr>

                    <tr> <td class="bg-theme-color-lemon text-white"><i class="fa fa-clock-o text-theme-color-yellow pr-20"></i>Class Time</td> <td class="bg-theme-color-orange text-white">{{$course->schedule ? \Carbon\Carbon::parse($course->schedule->time)->format('H:i a') : 'N/A'}} : {{$course->schedule ?\Carbon\Carbon::parse($course->schedule->time)->addHours(2)->format('H:i a') : 'N/A' }}</td> </tr>

                    
                  </tbody>
                </table>
                {{-- course rate --}}
                <form action="{{ route('courses.rate') }}" method="POST">

                  {{ csrf_field() }}
                  <h3> Course Average Rating: {{$course->averageRating ? $course->averageRating:"N/A" }}</h3>




                    <div class="rating">

                      <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $course->userAverageRating }}" data-size="xs">

                      <input type="hidden" name="id" required="" value="{{ $course->id }}">

                      <span class="review-no">Rated: ({{$course->averageRating!=null ? $course->ratings->count():"N/A"}})</span>

                      <br/>

                      <button class="btn btn-success">Submit Rate</button>

                  </div>
                </form>
                {{-- course reviews --}}
                <h3 class="widget-title line-bottom">Course <span class="text-theme-color-red">Review</span></h3>
                @foreach($reviews as $review)
                        <hr>
                        <div class="row">
                          <div class="col-md-12">

                            <h5 class="media-heading comment-heading">{{$review->user->name}} says:</h5>
                            <div class="comment-date">{{\Carbon\Carbon::parse($review->created_at)->format('d/m/yy')}}</div>

                          <p>{{{$review->message}}}</p>
                          </div>
                        </div>
                    @endforeach

                    <h4 class="widget-title line-bottom">Add<span class="text-theme-color-red">Review</span></h4>
                <form   action="{{route('courses.review')}}" method="post">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <textarea name="message" class="form-control" required="" placeholder="review this course" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="{{auth()->id()}}">
                      <input type="hidden" id="custsId" name="course_id" value="{{$course_id}}" >

                    </div>
                  </div>
                  <div class="form-group">

                    <button type="submit" class="btn btn-theme-color-sky btn-flat btn-xs btn-quick-contact text-white pt-5 pb-5" data-loading-text="Please wait...">Add Review</button>
                  </div>
                </form>
                <br>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif



              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="sidebar sidebar-left mt-sm-30">
                <div class="widget">
                  <h3 class="widget-title line-bottom">Courses <span class="text-theme-color-red">List</span></h3>
                  <div class="services-list">
                    <ul class="list list-border">
                    @foreach ($courses as $course)

                    <li class="active"><a href="{{route('courses.show', $course->id)}}">{{$course->name}}</a></li>
                    @endforeach
                    </ul>
                  </div>
                </div>

                <div class="widget">
                  <h3 class="widget-title line-bottom"><span class="text-theme-color-red">Lessons</span></h3>
                  <div class="latest-posts">
                    @foreach($posts as $post)
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="{{route('posts.show', ['course' => $course->id, 'post' => $post->id])}}"></a>
                      <div class="post-right">
                        <h4 class="post-title mt-0"><a href="{{route('posts.show', ['course' => $course->id, 'post' => $post->id])}}">{{$post->title}}</a></h4>
                        <p>{!! \Illuminate\Support\Str::limit($post->description, 30, '...') !!}</p>

                      </div>
                    </article>
                    @endforeach

                  </div>
                </div>



                {{-- TODO:Add quick contact when finish contact us page --}}
                <div class="widget">
                  <h3 class="widget-title line-bottom">Quick <span class="text-theme-color-red">Contact</span></h3>
                  <form id="quick_contact_form_sidebar" name="footer_quick_contact_form" class="quick-contact-form" action="http://html.kodesolution.live/s/kidspro/v2.1/demo/includes/quickcontact.php" method="post">
                    <div class="form-group">
                      <input name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                      <textarea name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <input name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-theme-color-sky btn-flat btn-xs btn-quick-contact text-white pt-5 pb-5" data-loading-text="Please wait...">Send Message</button>
                    </div>
                  </form>

                  <!-- Quick Contact Form Validation-->
                  <script type="text/javascript">
                    $("#quick_contact_form_sidebar").validate({
                      submitHandler: function(form) {
                        var form_btn = $(form).find('button[type="submit"]');
                        var form_result_div = '#form-result';
                        $(form_result_div).remove();
                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                        var form_btn_old_msg = form_btn.html();
                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                        $(form).ajaxSubmit({
                          dataType:  'json',
                          success: function(data) {
                            if( data.status == 'true' ) {
                              $(form).find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                          }
                        });
                      }
                    });
                  </script>
                </div>
                <div class="widget">
                  <img alt="" src="{{ asset('images/about/a1.png') }}" class="img-responsive img-fullwidth">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
            <img alt="" src="{{ asset('images/bg/f2.png') }}" class="img-responsive img-fullwidth">
        </div>
    </section>

@endsection
