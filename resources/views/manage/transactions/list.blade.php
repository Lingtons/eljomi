@extends('layouts.manage')
@section('title', 'Transactions')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Transactions</h3>
                      
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Client</th>
                                        <th>Category</th>
                                        <th>Total</th>
                                        <th>Pickup Date</th>
                                        <th>Delivery Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($transactions))
                                    @foreach($transactions as $key=>$transaction)
                                        <tr class="tr-shadow">
                                            <td>{{$key + 1}}</td>
                                            <th>{{$transaction->customer->name}}</th>
                                            <td>{{$transaction->service_category->name}}</td>
                                            <td>N {{number_format($transaction->total, 2)}}</td>
                                            <td>{{$transaction->pickup_time->toFormattedDateString()}}</td>                                            
                                            <td>{{$transaction->due_time->toFormattedDateString()}}</td>                                            
                                            <td>
                                                <div class="table-data-feature">                                                    
                                                    <a href="{{ route('expenses.edit', ['id' => $transaction->id])}}" class="item"  data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>          
                                                    
                                                    <a href="{{ route('transactions.show', ['id' => $transaction->id])}}" class="item"  data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-more"></i>
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
