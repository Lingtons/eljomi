@extends('layouts.manage')
@section('title', 'Customer')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Highest Spender </h3>
                        <div class="table-data__tool">
                         

                        </div>
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-dark-eljomi text-white">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th class="sr-only">Nickname</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Point</th>
                                        <th>Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($customers))
                                    @foreach($customers as $customer)
                                        <tr class="tr-shadow">
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td  class="sr-only">{{$customer->nickname}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->gender}}</td>
                                            <td>{{$customer->point}}</td>
                                            <td>{{$customer->type}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    
                                                    <a href="{{ route('customers.show', ['id' => $customer->id])}}" class="item"  data-placement="top" title="View Client">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('customers.edit', ['id' => $customer->id])}}" class="item"  data-placement="top" title="Edit Information">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a href="#" data-target="#addClientPreference{{ $customer->id }}" data-toggle="modal" class="item"  data-placement="top" title="Set Preference">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </a>

                                                    <a href="{{ route('customer.transactions', ['id' => $customer->id])}}"  class="item" data-placement="top" title="Client Transactions">
                                                        <i class="zmdi zmdi-money-box"></i>
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
