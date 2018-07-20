@extends('layouts.manage')

@section('title', 'Dashboard')

@section('content')

    <!-- STATISTIC -->

    @include('include.manage.statistic')

    <!-- END STATISTIC -->

    <!-- STATISTIC CHART -->

    @include('include.manage.statistic_chart')

    <!-- END STATISTIC CHART -->

@stop