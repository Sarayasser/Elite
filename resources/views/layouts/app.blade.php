<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
<body>
    
    <body class="">
        <div id="wrapper" class="clearfix">
            <!-- preloader -->
            @include('includes.preloader')

            <!-- Header -->
            @include('includes.header')

            <!-- Start main-content -->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- end main-content -->
        </div>

    <!-- Footer -->
    @include('includes.footer')

    <!-- Script -->
    @include('includes.script')
</body>
</html>
