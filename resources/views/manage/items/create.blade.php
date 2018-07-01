@extends('layouts.manage')
@section('title', 'Create Item')

@section('content')
    <!-- Create Item-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Create Item</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Item</h3>
                                </div>
                                <hr>
                                {!! Form::open(['route'=>'items.store', 'class'=>'form-horizontal form-label-left']) !!}

                                    @include('manage.items.partials.form', ['submit'=>'Create Item'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!--End Create Item-->
@stop