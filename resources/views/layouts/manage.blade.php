<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lingthon Tech">
    <meta name="author" content="Lingthon">
    <meta name="keywords" content="Lingthon">

    <link rel="shortcut icon" href="{{asset('images/icon/favicon.ico')}}" type="image/x-icon">
<link rel="icon" href="{{asset('images/icon/favicon.ico')}}" type="image/x-icon">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Admin Section - @yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">    

    <!-- Vendor CSS-->
<!-- 
    <link href="{{ asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">    
  -->
    <link href="{{ asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
 
 

 <link href="{{ asset('vendor/select2/select2-bootstrap4.css')}}" rel="stylesheet" media="all">
   <!--  <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <!-- header -->
        @if(auth()->user()->type == 'Administrator')
        @include('include.manage.header')
        @elseif(auth()->user()->type == 'Marketer')
        @include('include.manage.marketer_header')
        @else
        @include('include.manage.factory_header')
        @endif
        <!-- end of header -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            @include('include.manage.breadcrumb')
            <!-- END BREADCRUMB-->
            
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                           @include('flash::message')
                        </div>
                    </div>
                </div>
            </section>

             <!-- END WELCOME-->

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
    <!-- Vendor JS       -->
    <!-- <script src="{{ asset('vendor/slick/slick.min.js')}}">
    </script> -->
    <!-- <script src="{{ asset('vendor/wow/wow.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/animsition/animsition.min.js')}}"></script> -->
    <!-- <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script> -->
    <!-- <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js')}}">
     --></script>
<!--     <script src="{{ asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
 -->    <!-- <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script> -->
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js')}}"></script>
    
    @yield('scripts')

</body>

</html>
<!-- end document-->