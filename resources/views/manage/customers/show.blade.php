@extends('layouts.manage')
@section('title', 'Customer')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Clients </h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div>
                            <div class="table-data__tool-right">
                                <a  href="{{route('customers.create')}}" data-toggle="modal" data-target="#addcustomerModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Client</a>
                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th class="sr-only">nickname</th>
                                        <th>phone</th>
                                        <th>gender</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customer)
                                    
                                        <tr class="tr-shadow">
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td  class="sr-only">{{$customer->nickname}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->gender}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    
                                                    <a href="{{ route('customers.edit', ['id' => $customer->id])}}" class="item"  data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- END DATA TABLE-->
@stop
