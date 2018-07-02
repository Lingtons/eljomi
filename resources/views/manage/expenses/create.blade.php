@extends('layouts.manage')
@section('title', 'Create Expense')

@section('content')
    <!-- Create Expense-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Create Expense</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Expense</h3>
                                </div>
                                <hr>
                                {!! Form::open(['route'=>'expenses.store', 'class'=>'form-horizontal form-label-left']) !!}

                                    @include('manage.expenses.partials.form', ['submit'=>'Create Expense'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!--End Create Expense-->
    
@stop