@extends('layouts.manage')
@section('title', 'Create Customer')

@section('content')
    <!-- Edit Customer-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Create Customer </h3>
                        {!! Form::model($customer, ['method'=> 'PATCH', 'class'=>'form-horizontal form-label-left','route' => ['customers.update', $customer->id]]) !!}

                            @include('manage.customers.partials.form', ['submit'=>'Update'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    <!-- End Edit Customer-->
@stop