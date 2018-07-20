@extends('layouts.manage')
@section('title', 'Expense')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Expenses </h3>
                        <div class="table-data__tool">

                            <div class="">
                                <a  href="{{route('expenses.create')}}" data-toggle="modal" data-target="#addexpenseModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Expense</a>
                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>id</th>                                          
                                        <th>Expense Category</th>                                      
                                        <th>reason</th>
                                        <th>Description</th>
                                        <th>amount</th>
                                        <th>Date</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($expenses))
                                    @foreach($expenses as $expense)
                                        <tr class="tr-shadow">
                                            <td>{{$expense->id}}</td>                                            
                                            <td>{{$expense->expense_category->name}}</td>
                                            <td>{{$expense->reason}}</td>
                                            <td>{{$expense->description}}</td>
                                            <td>NGN {{number_format($expense->amount, 2)}}</td>
                                            <td>{{$expense->date_occurred}}</td>
                                            
                                            <td>
                                                <div class="table-data-feature">
                                                    
                                                    <a href="{{ route('expenses.edit', ['id' => $expense->id])}}" class="item"  data-placement="top" title="Edit">
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
