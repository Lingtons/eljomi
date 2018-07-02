@extends('layouts.manage')
@section('title', 'Edit Expense')

@section('content')
    <!-- Edit Expense-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Edit Expense</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Expense</h3>
                                </div>
                                <hr>
                                {!! Form::model($expense, ['method'=> 'PATCH', 'class'=>'form-horizontal form-label-left','route' => ['expenses.update', $expense->id]]) !!}

                                    @include('manage.expenses.partials.form', ['submit'=>'Update'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!-- End Edit Expense-->
@stop