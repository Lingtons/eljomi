@extends('layouts.manage')
@section('title', 'Create Customer')

@section('content')
    <!-- Create Customer-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Create Customer</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Customer</h3>
                                </div>
                                <hr>
                                {!! Form::open(['route'=>'customers.store', 'class'=>'form-horizontal form-label-left']) !!}

                                    @include('manage.customers.partials.form', ['submit'=>'Create Customer'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!--End Create Customer-->
    
@stop