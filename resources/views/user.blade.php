<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        @include('includes.head')
    </head>

<body class="">
    
<a href="{{route("register", "instructor")}}" class="btn btn-gray btn-theme-color-sky"><i class="fa fa-home"></i>Instructor</a>

    <a href="{{route("register" , "parent")}}" class="btn btn-gray btn-theme-color-sky"><i class="fa fa-home"></i>Parent</a>
    <a href="{{route("register" , "student")}}" class="btn btn-gray btn-theme-color-sky"><i class="fa fa-home"></i>Student</a>

    <!-- Script -->
    @include('includes.script')
</body>
</html>