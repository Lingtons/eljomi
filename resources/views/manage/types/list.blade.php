@extends('layouts.manage')
@section('title', 'Types')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Types</h3>
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
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item</button>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if (count($types))
                        			@foreach($types as $type)
	                                    <tr class="tr-shadow">
	                                        <td>
	                                            <label class="au-checkbox">
	                                                <input type="checkbox">
	                                                <span class="au-checkmark"></span>
	                                            </label>
	                                        </td>
	                                        <td>{{$type->id}}</td>
	                                        <td>{{$type->name}}</td>
	                                        <td>
	                                            <div class="table-data-feature">
	                                                
	                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
	                                                    <i class="zmdi zmdi-edit"></i>
	                                                </button>
	                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
	                                                    <i class="zmdi zmdi-delete"></i>
	                                                </button>
	                                                
	                                            </div>
	                                        </td>
	                                    </tr>
	                                    <tr class="spacer"></tr>
                                    @endforeach
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