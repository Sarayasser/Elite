<!DOCTYPE html>
<html lang="en">

<head>
   @include('auth_includes.head')
</head>

<body>

    <div class="page-wrapper bg-gra-02 p-t-0 p-b-100 font-poppins">
    <button class="btn btn--radius-2 btn--blue" style="background: #c08181;  margin: 15px;" >
        <a href="{{route('home')}}">{{ __('Home') }}</a>
    </button>

        <div style="padding-top: 130px;">
            <div class="wrapper wrapper--w680">
                @yield('content')
            </div>
        <div>
    </div>

    @include('auth_includes.script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->