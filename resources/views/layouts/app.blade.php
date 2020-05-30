<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        @include('includes.head')
    </head>

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

             <!-- Footer -->
             @include('includes.footer')

        </div>

        <!-- Script -->
        @include('includes.script')
    </body>
</html>