@extends('layouts.manage')
@section('title', 'Item')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Items </h3>
                   
                    
                            <div class="float-right p-2">
                                <a  href="{{route('items.create')}}" data-toggle="modal" data-target="#additemModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Item</a>
                            </div>
                       
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th >Item Category</th>
                                        <th>Service Category</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($items))
                                    @foreach($items as $item)
                                        <tr class="tr-shadow">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td >{{$item->item_category->name}}</td>
                                            <td>{{$item->service_category->name}}</td>
                                            <td>NGN {{$item->price}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    
                                                    <a href="{{ route('items.edit', ['id' => $item->id])}}" class="item"  data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    
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
