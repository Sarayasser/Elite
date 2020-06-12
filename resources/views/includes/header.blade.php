<!-- Header -->
<header id="header" class="header">
    <div class="header-middle p-0 bg-lightest xs-text-center">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-5">
            <div class="widget no-border m-0">
              <a href="{{route('home')}}" class="menuzord-brand pull-left flip xs-pull-center mb-15" style="margin: 0 30px 0 0;" href="javascript:void(0)"><img src="{{ asset('images/logo.png')}}" alt=""></a>
            </div>
          </div>
          @if(Auth::user())
          <div class="col mt-10" style="float:right;">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li>
                <div class="btn-group">
                <button class="fa fa-bell fa-2x mr-200" type="button" data-toggle="dropdown" style="border-color:transparent;background:transparent;" aria-haspopup="true" aria-expanded="false"></button>
                <ul class="dropdown-menu">
                @if(Auth::user()->hasRole('student') && Auth::user())
                <li>
                @foreach($test as $t)
                @if($t->event_id)
                <a class="dropdown-item" href="{{$t}}"><i class='fa fa-user'></i> {{$t->description}} {{$t->event->name}}</a>
                  <div class="dropdown-divider"></div>
                @endif
                @if($t->post_id)
                <a class="dropdown-item" href="{{$t}}"><i class='fa fa-user'></i> {{$t->description}} {{$t->course->name}}</a>
                  <div class="dropdown-divider"></div>
                @endif
                @endforeach
                <li>
                @endif
                  </ul>
                </div>
                </li>
              </ul>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-color-red border-bottom-theme-color-sky-2px">
        <div class="container">
          <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
            <ul class="menuzord-menu">
              <li class="{{ Request::is('/') ? 'active' : '' }}" ><a href="{{route('home')}}">Home</a></li>
              <li class="{{ Request::is('courses') ? 'active' : '' }}" ><a href="{{route('courses.index')}}">Courses</a></li>
              <li class="{{ Request::is('instructors') ? 'active' : '' }}" ><a href="{{route('instructors.index')}}">Instructors</a></li>
              <li class="{{ Request::is('event') ? 'active' : '' }}"><a href="{{route('events.index')}}">Events</a></li>
              <li><a href="#">Schedule</a></li>
              <li class="{{ Request::is('contact') ? 'active' : '' }}" ><a href="{{route('contact.create')}}">Contact us</a></li>
              <li class="{{ Request::is('about') ? 'active' : '' }}" ><a href="{{route('about')}}">About</a></li>
              <li class="{{ Request::is('faq') ? 'active' : '' }}"><a href="{{ route('faq') }}">FAQ</a></li>
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
                  @if (Auth::user()->hasRole('admin'))
                      <a href="/admin/dashboard" class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" ><i class="fa fa-user-secret fa-2x" style="font-size: 1.2em;"> Dashboard</i> </a>
                  @elseif (Auth::user()->hasRole('instructor'))
                      <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{route('dashboard',"instructor")}}">Dashboard</a>
                  @elseif (Auth::user()->hasRole('parent'))
                      <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{route('dashboard',"parent")}}">Dashboard</a>
                  @else
                      <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{route('dashboard',"student")}}">Dashboard</a>
                  @endif
                  <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{route('user.show',['user'=>Auth::user()->id])}}" >  {{ Auth::user()->name }}</a>
                  <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-16 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" href="{{ route('logout') }}"
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
