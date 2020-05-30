@extends('layouts.app')

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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Course details</li>
                </ol>
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
                <img src="{{ asset('images/services/lg1.jpg') }}" alt="">
                <h2 class="text-theme-color-red line-bottom">Learning Classes</h2>
                <h4 class="mt-0"><span class="text-theme-color-red">Price :</span> $250</h4>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%"">5.00</span></div>
                    </li>
                  </ul>
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo unde, <span class="text-theme-color-red">Learning classes</span> corporis dolorum blanditiis ullam officia <span class="text-theme-color-red">our kindergarten </span>natus minima fugiat repellat! Corrupti voluptatibus aperiam voluptatem. Exercitationem, placeat, cupiditate.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore suscipit, inventore aliquid incidunt, quasi error! Natus esse rem eaque asperiores eligendi dicta quidem iure, excepturi doloremque eius neque autem sint error qui tenetur, modi provident aut, maiores laudantium reiciendis expedita. Eligendi</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore voluptatem officiis quod animi possimus a, iure nam sunt quas aperiam non recusandae reprehenderit, nesciunt cumque pariatur totam repellendus delectus? Maxime quasi earum nobis, dicta, aliquam facere reiciendis, delectus voluptas, ea assumenda blanditiis placeat dignissimos quas iusto repellat cumque.</p>
                <h3 class="line-bottom mt-20 mb-20 text-theme-color-red">Courses Information</h3>
                <table class="table table-bordered"> 
                  <tr>
                    <td class="text-center font-16 font-weight-600 bg-theme-color-blue text-white" colspan="4">Details For All Lesson Type</td>
                  </tr>
                  <tbody> 
                    <tr> <td><i class="fa fa-calendar text-theme-color-red pr-20"></i>Start Date</td> <td>Jan 15, 2018</td> </tr> 
                    <tr> <td class="bg-theme-color-yellow text-white"><i class="fa fa-birthday-cake text-theme-color-blue pr-20"></i>Years Old</td> <td class="bg-theme-color-green text-white">5-6 Years</td> </tr> 
                    <tr> <td><i class="fa fa-users text-theme-color-red pr-20"></i>Class Size</td> <td>20-30 Kids</td> </tr> 
                    <tr> <td class="bg-theme-color-red text-white"><i class="fa fa-user text-theme-color-yellow pr-20"></i>Course Staff</td> <td class="bg-theme-color-sky text-white">2 Teachers</td> </tr>
                    <tr> <td><i class="fa fa-anchor text-theme-color-red pr-20"></i>Carry Time</td> <td>5 Hours/6 Days</td> </tr> 
                    <tr> <td class="bg-theme-color-lemon text-white"><i class="fa fa-fighter-jet text-theme-color-red pr-20"></i>Coures Duration</td> <td class="bg-theme-color-orange text-white">10-12 Month</td> </tr>  
                    <tr> <td><i class="fa fa-clock-o text-theme-color-red pr-20"></i>Class Time</td> <td>9:30am-5:30pm</td> </tr> 
                    <tr> <td class="bg-theme-color-sky text-white"><i class="fa fa-credit-card-alt text-theme-color-red pr-20"></i>Tution Free</td> <td class="bg-theme-color-red text-white">$ 250.00</td> </tr>  
                  </tbody> 
                </table>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="sidebar sidebar-left mt-sm-30">
                <div class="widget">
                  <h3 class="widget-title line-bottom">Courses <span class="text-theme-color-red">List</span></h3>
                  <div class="services-list">
                    <ul class="list list-border">
                      <li class="active"><a href="page-courses-learning-classes.html">Learning Classes</a></li>
                      <li><a href="page-courses-language-classes.html">Language Classes</a></li>
                      <li><a href="page-courses-drawing-Classes-2.html">Drawing Classes</a></li>
                      <li><a href="page-courses-multimedia-classes.html">Multimedia Classes</a></li>
                      <li><a href="page-courses-math-classes.html">Math Classes</a></li>
                    </ul>
                  </div>
                </div>
                <div class="widget">
                  <h3 class="widget-title line-bottom">Latest <span class="text-theme-color-red">Course</span></h3>
                  <div class="latest-posts">
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="{{ asset('images/services/s1.jpg') }}" alt=""></a>
                      <div class="post-right">
                        <h4 class="post-title mt-0"><a href="#">Sustainable Construction</a></h4>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="{{ asset('images/services/s3.jpg') }}" alt=""></a>
                      <div class="post-right">
                        <h4 class="post-title mt-0"><a href="#">Industrial Coatings</a></h4>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="#"><img src="{{ asset("images/services/s2.jpg") }}" alt=""></a>
                      <div class="post-right">
                        <h4 class="post-title mt-0"><a href="#">Storefront Installations</a></h4>
                        <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                      </div>
                    </article>
                  </div>
                </div>
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