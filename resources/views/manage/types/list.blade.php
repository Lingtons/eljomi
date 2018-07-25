@extends('layouts.manage')
@section('title', 'Types')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Service Types</h3>
                        <div class="table-data__tool">
                           
                            <div class="table-data__tool-right">
                                <a  href="#" data-toggle="modal" data-target="#addTypeModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Type</a>
                            </div>
                            @include('include.modals.service_types.add')
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2" id="datatable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if (count($types))
                        			@foreach($types as $type)
	                                    <tr class="tr-shadow">
	                                        <td>{{$type->id}}</td>
	                                        <td>{{$type->name}}</td>
	                                        <td>
	                                            <div class="table-data-feature">
	                                                
	                                                <a href="#" data-target="#editTypeModal{{ $type->id }}" data-toggle="modal" class="item"  data-placement="top" title="Edit">
	                                                    <i class="zmdi zmdi-edit"></i>
	                                                </a>
	                                                
	                                            </div>
	                                        </td>
                                              @include('include.modals.service_types.edit')
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
@section('scripts')
<script src="{{ asset('js/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }} "></script>
<script>
  $(document).ready(function () {
    $('#datatable').dataTable();
  });
</script>
@endsection