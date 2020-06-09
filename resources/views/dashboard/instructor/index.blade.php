@extends('layouts.app')

@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <img src="images/services/lg1.jpg" alt="">
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
                <h3 class="widget-title line-bottom">Instructor <span class="text-theme-color-red">Dashboard</span></h3>
                <div class="services-list">
                  <ul class="list list-border">
                    <li class="active"><a href="">Courses</a></li>
                    <li><a href="{{route('dashboard.students',"instructor")}}">Students</a></li>
                    <li><a href="{{route('dashboard.events',"instructor")}}">Events</a></li>
                    <li><a href="#">Schedules</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div> 
          <img alt="" src="images/bg/f2.png" class="img-responsive img-fullwidth">
      </div>
    </section>


@endsection