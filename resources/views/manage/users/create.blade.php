@extends('layouts.manage')
@section('title', 'Users Create')

@section('content')
    <!-- Create Expense-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Join the Eljomi Community</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Join Eljomi</h3>
                                </div>
                                <hr>
                                {!! Form::open(['route'=>'users.store', 'class'=>'form-horizontal form-label-left']) !!}

                                    @include('manage.users.partials.form', ['submit'=>'Join Eljomi'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!--End Create Expense-->
@stop
