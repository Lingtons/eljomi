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
                      
                            <div class="table-data__tool-right">
                                <a  href="{{route('customers.index')}}"  class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-arrow-left"></i>Back</a>
                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>                                    
                                        <th>name</th>
                                        <th>nickname</th>                                        
                                        <th>gender</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customer)
                                    
                                        <tr class="tr-shadow">                                          
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->nickname}}</td>                                            
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

                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>

                                        <th>Address</th>                                   
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customer)
                                    
                                        <tr class="tr-shadow">

                                            <td>{{$customer->address}}</td>                                            
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->phone}}</td>
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

                        <div class="table-responsive table--no-card m-b-30 ">
                                <table class="table table-bordered table-striped">
                                    <thead class="">
    
                                    <tr>
                                        <th colspan="2">Preference</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customer)
                                    @foreach($customer->preferences as $key => $preference)
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

                    </div>
                </div>
            </div>
        </section>
    <!-- END DATA TABLE-->
@stop
