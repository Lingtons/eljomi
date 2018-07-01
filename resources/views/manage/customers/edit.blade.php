@extends('layouts.manage')
@section('title', 'Edit Customer')

@section('content')
    <!-- Edit Customer-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Edit Customer</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Customer</h3>
                                </div>
                                <hr>
                                {!! Form::model($customer, ['method'=> 'PATCH', 'class'=>'form-horizontal form-label-left','route' => ['customers.update', $customer->id]]) !!}

                                    @include('manage.customers.partials.form', ['submit'=>'Update'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!-- End Edit Customer-->
@stop