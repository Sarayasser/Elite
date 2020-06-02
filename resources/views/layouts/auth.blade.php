<!DOCTYPE html>
<html lang="en">

<head>
   @include('auth_includes.head')
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">

        <div class="wrapper wrapper--w680">
             @yield('content')
        </div>
    </div>

    @include('auth_includes.script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->