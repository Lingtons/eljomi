@extends('layouts.manage')
@section('title', 'Create Customer')

@section('content')
    <!-- Create Customer-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Create Customer</h3>
                        {!! Form::open(['route'=>'customers.create', 'class'=>'form-horizontal form-label-left']) !!}

                        	@include('manage.customers.partials.form', ['submit'=>'Create Customer'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    <!--End Create Customer-->
@stop