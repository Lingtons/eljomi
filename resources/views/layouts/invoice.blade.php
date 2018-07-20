<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lingthon Tech">
    <meta name="author" content="Lingthon">
    <meta name="keywords" content="Lingthon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Admin Section - @yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css')}}" rel="stylesheet" media="all" type="text/css">
    <!-- <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all" type="text/css"> -->
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all" type="text/css">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all" type="text/css">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all" type="text/css">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all" type="text/css">    
 
   <!--  <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css')}}" rel="stylesheet" media="all" type="text/css">

</head>

<body>
    <div class="page-wrapper">
        <!-- header -->
        @include('include.manage.invoice_top')
        <!-- end of header -->

            @yield('content')

            <!-- COPYRIGHT-->
            @include('include.manage.copyright')
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js')}}"></script>
    
    @yield('scripts')

</body>

</html>
<!-- end document-->