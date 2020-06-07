<!-- Header -->
<header id="header" class="header">
    <div class="header-middle p-0 bg-lightest xs-text-center">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-5">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center mb-15" style="margin: 0 30px 0 0;" href="javascript:void(0)"><img src="{{ asset('images/logo.png')}}" alt=""></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-phone-square text-theme-color-sky font-36 mt-5 sm-display-block"></i></li>
                <li>
                  <a href="#" class="font-12 text-black text-uppercase">Call us today!</a>
                  <h5 class="font-14 text-theme-color-blue m-0"> +(012) 345 6789</h5>
                </li>
              </ul>
            </div>
          </div>  
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-clock-o text-theme-color-red font-36 mt-5 sm-display-block"></i></li>
                <li>
                  <a href="#" class="font-12 text-black text-uppercase">We are open!</a>
                  <h5 class="font-13 text-theme-color-blue m-0"> Mon-Fri 8:00-16:00</h5>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-color-red border-bottom-theme-color-sky-2px">
        <div class="container">
          <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
            <ul class="menuzord-menu">
              <li class="active"><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{route('courses.index')}}">Courses</a></li>
              <li><a href="{{route('instructors.index')}}">Instructors</a></li>
              <li><a href="{{route('events.index')}}">Events</a></li>
              <li><a href="#">Schedule</a></li>        
              <li><a href="#">FAQ</a></li>
              @if (Auth::user())
              <li><a href="{{route('user.show',['user'=>Auth::user()->id])}}" class="col ml-20"><i class="fa fa-cog fa-spin" style="width:150%;"></i></a></li>
              @endif
            </ul>
            <ul class="pull-right flip hidden-sm hidden-xs">
              <li>
                @guest
                  <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{ route('login') }}">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                      <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{ route('users') }}">{{ __('Register') }}</a>
                  @endif
                @else
                  <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="#">  {{ Auth::user()->name }}</a>
                  <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                 
                 @endguest
                <!-- Modal: Book Now Starts -->
                {{-- <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" data-toggle="modal" data-target="#BSParentModal" href="{{ asset('ajax-load/reservation-form.html')}}">Book Now</a> --}}
                <!-- Modal: Book Now End -->
              <!-- <a href="#" class="col ml-20"><i class="fas fa-cogs"></i></a> -->
              </li>
            </ul>
            <div id="top-search-bar" class="collapse">
              <div class="container">
                <form role="search" action="#" class="search_form_top" method="get">
                  <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                  <span class="search-close"><i class="fa fa-search"></i></span>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
</header>