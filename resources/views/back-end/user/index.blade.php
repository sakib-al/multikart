@extends('back-end.layout.master_back_end')

@section('master_title')Multikart - Users @endsection
@section('page_title')Users @endsection
@section('bread_title')Users @endsection

@section('users')active @endsection
@section('user_list')active @endsection

@section('back_custom_css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/jsgrid.css') }}"> --}}
<style>
    .user-table th{
        text-align: center;
    }
    thead th {
    border-top: none !important;
    border-bottom: none !important;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>User List</h5>
                </div>
                <div class="card-body">
                    <table id="user_table" class="table table-striped table-bordered user-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users)
                            <tr>
                                <td><img src="{{asset('/')}}images/users/{{ $users->user_image ?? 'no-image.jpg' }}"style="height: 50px; width: 50px;" alt="Avatar"></td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td class="text-capitalize">{{ $users->role_name }}</td>
                                <td>
                                    @if($users->user_status == 1)
                                        Active
                                        @else
                                        Inactive
                                    @endif
                                </td>
                                <td class="text-center" width="15%">
                                    <a href="{{ route('user.edit',$users->id) }}" class="btn btn-sm btn-danger">Edit</a>
                                    <a href="{{ route('user.delete',$users->id) }}" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('back-end_custom_js')
<script>
    $(document).ready(function() {
        $('#user_table').DataTable();
    } );
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('back-end/assets/js/back-panel/location.js') }}"></script>

@endsection
