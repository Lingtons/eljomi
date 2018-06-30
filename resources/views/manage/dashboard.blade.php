@extends('layouts.manage')
@section('title', 'Dashboard')

@section('content')
    <!-- STATISTIC-->
    @include('include.manage.statistic')
    <!-- END STATISTIC-->

    <!-- STATISTIC CHART-->
    @include('include.manage.statistic_chart')
    <!-- END STATISTIC CHART-->

    <!-- DATA TABLE-->
    @include('include.manage.data_table')
    <!-- END DATA TABLE-->
@stop
