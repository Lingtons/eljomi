@extends('layouts.manage')
@section('title', 'Transactions')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Transactions <span class="text-info float-right">{{$customer->name}}</span>  </h3>
                        
                      
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-dark-eljomi text-white">
                                    <tr>
                                        <th>id</th>                                       
                                        <th>Category</th>
                                        <th>Total</th>
                                        <th>Pickup Date</th>
                                        <th>Due Date</th>
                                        <th>Delivered</th>
                                        <th>Paid Off</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($customer))
                                    @foreach($customer->transactions as $key=>$transaction)
                                        <tr class="tr-shadow">
                                            <td>{{$key + 1}}</td>                                           
                                            <td>{{$transaction->service_category->name}}</td>
                                            <td>NGN {{number_format($transaction->total, 2)}}</td>
                                            <td>{{$transaction->pickup_time->toFormattedDateString()}}</td>                                            
                                            <td>{{$transaction->due_time->toFormattedDateString()}}</td>                                            
                                            <td>{{$transaction->delivered == 0 ? 'No' : 'Yes'}}</td>
                                            <td>{{$transaction->paid < 1 ? 'No' : 'Yes'}}</td>
                                            <td>
                                                <div class="table-data-feature">                                                    
                                                    <a href="#" data-toggle="modal" class="item" data-target="#addPaymentModal{{$transaction->id}}"  data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-money-box"></i>
                                                    </a> 

                                                    
                                                    <a href="{{ route('transactions.show', ['id' => $transaction->id])}}" class="item"  data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-print"></i>
                                                        </a> 
                                                </div>
                                            </td>
                                            @include('include.modals.payments.add')
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
