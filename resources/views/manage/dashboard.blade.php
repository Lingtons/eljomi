@extends('layouts.manage')

@section('title', 'Dashboard')

@section('content')

    
    
<!-- if admin -->
    @if(auth()->user()->type == 'Administrator')

    <!-- STATISTIC -->
    @include('include.manage.statistic')

    <!-- END STATISTIC -->

    <!-- STATISTIC CHART -->

    @include('include.manage.statistic_chart')

    <!-- END STATISTIC CHART -->

    @endif


<!-- end if admin -->    

<!-- end if Factory -->    
    @if(auth()->user()->type == 'Factory')

    <!-- Today Delivery -->

    @include('include.manage.delivery.today')

    <!-- End Today Delivery -->

    <!-- Pending Delivery -->
    
    @include('include.manage.delivery.pending')

    <!-- End Pending Delivery -->

    <!-- Overdue Delivery -->
        
    @include('include.manage.delivery.overdue')

    <!-- End Overdue Delivery -->


    @endif


    <!-- end if Factory -->    
    @if(auth()->user()->type == 'Marketer')

    <!-- Today Delivery -->

    @include('include.manage.delivery.debt')

    <!-- End Today Delivery -->

    @endif

@stop