@extends('layouts.manage')
@section('title', 'Preference')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Client Preferences</h3>
                        <div class="table-data__tool">
                   
                            <div class="table-data__tool-right">
                                <a  href="#" data-toggle="modal" data-target="#addPreferenceModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Preference</a>
                            </div>
                            @include('include.modals.client_preferences.add')
                        </div>
                        <div class="table-responsive table--no-card m-b-30 ">
                            <table class="table table-bordered table-striped table-earning" id="datatable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if (count($preferences))
                        			@foreach($preferences as $preference)
	                                    <tr class="tr-shadow">
	                                        <td>{{$preference->id}}</td>
	                                        <td>{{$preference->name}}</td>
	                                        <td>
	                                            <div class="table-data-feature">
	                                                
	                                                <a href="#" data-target="#editPreferenceModal{{ $preference->id }}" data-toggle="modal" class="item"  data-placement="top" title="Edit">
	                                                    <i class="zmdi zmdi-edit"></i>
	                                                </a>
                                                    <a href="#" data-target="#addValueModal{{ $preference->id }}" data-toggle="modal" class="item"  data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </a>
	                                            </div>
	                                        </td>
                                            @include('include.modals.client_preferences.edit')
                                            @include('include.modals.client_preferences.add_value')
	                                    </tr>
	                                    
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