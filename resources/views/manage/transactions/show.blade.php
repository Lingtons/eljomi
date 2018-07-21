@extends('layouts.invoice')
@section('title', 'Transaction Reciept')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container-fluid">
                    <h3 class="title-5 mb-2">Invoice | {{$transaction->transaction_code}} <span class="float-right">{{$transaction->service_category->name}} Service</span></h3>
                <div class="row">                        
                    <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    @if ($transaction)                                    
                                        <tr class="tr-shadow">                                            
                                            <td>Name:</td>
                                            <td>{{$transaction->customer->name}}</td>                                            
                                        </tr>
                                        <tr class="tr-shadow">                                                                                            
                                                <td>Phone:</td>
                                                <td>{{$transaction->customer->phone}}</td>                                            
                                        </tr>
                                        <tr class="tr-shadow">                                                                                            
                                                <td>Address:</td>
                                                <td>{{$transaction->customer->address}}</td>                                            
                                        </tr>                                        
                                        <tr class="spacer"></tr>                                    
                                    @endif
                                </tbody>
                            </table>

                    </div>
                    <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    @if ($transaction)                                    
                                        <tr class="tr-shadow">                                            
                                            <td>Collection Date :</td>
                                            <td>{{$transaction->pickup_time->toFormattedDateString()}}</td>                                            
                                        </tr>
                                        <tr class="tr-shadow">                                            
                                                <td>Expected Delivery Date :</td>
                                                <td>{{$transaction->due_time->toFormattedDateString()}}</td>                                            
                                        </tr>
                                        <tr class="tr-shadow">                                            
                                                <td>Payment Status :</td>
                                                <td>{{$transaction->paid < $transaction->total ? 'Not Paid' : 'Paid' }} </td>                                            
                                        </tr>                                        
                                        <tr class="spacer"></tr>                                    
                                    @endif
                                </tbody>
                            </table>

                    </div>
                    
                    
                    <div class="col-md-8 mt-5">                                              
                        <div class="table-responsive table--no-card m-b-30 ">
                                <table class="table table-bordered table-striped">
                                    <thead class="">
    
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
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td><strong> NGN {{number_format($transaction->total,2)}}</strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                        Amount in Words :   <em>  {{ ucwords(formatCur()->format($transaction->total)) }} Naira Only</em>
                                        </td>                                        
                                    </tr>
                                </tbody>                                
                            </table>
                            <table class="table table-bordered mt-5">
                                <thead>
                                    <tr>
                                        <td>Deposit</td>
                                        <td><strong> NGN {{number_format($transaction->paid,2)}}</strong></td>

                                    </tr>
                                    <tr>
                                            <td>Balance</td>
                                            <td><strong> NGN {{number_format($transaction->balance,2)}}</strong></td>
    
                                        </tr>
                                        <tr>
                                            <td colspan="1"></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Customer Sign</td>
                                            <td>______________________</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>For Eljomi</td>
                                            <td>______________________</td>
                                        </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 mt-5">                                              
                            <div class="table-responsive table--no-card m-b-30 ">
                                    <table class="table table-bordered table-striped">
                                        <thead class="">
        
                                        <tr>
                                            <th colspan="2">Preference</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($transaction)
                                        @foreach($transaction->customer->preferences as $key => $preference)
                                            <tr class="tr-shadow">                                                
                                                <td>{{$preference->name}}</td>
                                                <td>{{$preference->pivot->value}}</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>                                               
                            </div>
                            <p class="mt-2 p-2">
                                    <em class="mr-2">Note:</em>
                                    <br>
                                    Please check your pockets before submitting your clothing in case of any item there in.
                                    <br><br>
                                    We will not be responsible for any shrinkage, fading colour-run or broken buttons/breads although all necessary precautions will
                                    be taken.
                                    <br><br>
                                    We will not be responsible for items not claimed after one month from the date of deposit.
                                </p>       
                        </div>
                </div>

                
            </div>
            
        </section>
        
    <!-- END DATA TABLE-->
@stop
