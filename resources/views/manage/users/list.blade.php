@extends('layouts.manage')
@section('title', 'Users')

@section('content')
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Users</h3>
                    <div class="table-data__tool">
                        
                        <div class="table-data__tool-right">
                            <a  href="#" data-toggle="modal" data-target="#addUserModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add User</a>
                        </div>
                        @include('include.modals.users.add')
                    </div>
                    <div class="table-responsive table--no-card m-b-30 ">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead class="bg-dark-eljomi text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if (count($users))
                    			@foreach($users as $user)
                                    <tr class="tr-shadow">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->type}}</td>
                                        <td>
                                            <div class="table-data-feature">    
                                                <a href="#" data-target="#editUserModal{{ $user->id }}" data-toggle="modal" class="item"  data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @include('include.modals.users.edit')
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