@extends('layouts.manage')
@section('title', 'Transaction Reciept')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                <!--         <div class="col-md-6">                                                          
                              <table class="table table-striped table-bordered">
                                  <tbody>
                                      <tr>
                                          <td>Name</td>
                                          <td>{{$transaction->customer->name}}</td>
                                      </tr>
                                      <tr>
                                            <td>Phone</td>
                                            <td>{{$transaction->customer->phone}}</td>
                                      </tr>
                                      <tr>
                                            <td>Address</td>
                                            <td>{{$transaction->customer->address}}</td>
                                      </tr>
                                  </tbody>

                              </table>
                           

                        </div>
                        <div class="col-md-6 ">
                            
                               
                                  <table class="table table-striped table-bordered">
                                      <tbody>
                                          <tr>
                                              <td>Collection Date</td>
                                              <td>{{$transaction->pickup_time->toFormattedDateString()}}</td>
                                          </tr>
                                          <tr>
                                                <td>Delivery Date</td>
                                                <td>{{$transaction->due_time->toFormattedDateString()}}</td>
                                          </tr>
                                          
                                      </tbody>
    
                                  </table>
                               

                        </div> -->
                    </div>
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Invoice | {{$transaction->transaction_code}}</h3>
                      
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Note</th>
                                                                                
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($transaction)
                                    @foreach(json_decode($transaction->collections) as $key => $collection)
                                        <tr class="tr-shadow">
                                            <td>{{$key + 1}}</td>
                                            <td>{{$collection->item_name}}</td>
                                            <td>{{$collection->quantity}}</td>
                                            <td>{{$collection->amount / $collection->quantity }}</td>
                                            <td>{{$collection->amount }}</td>
                                            <td>{{$collection->note }}</td>
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
