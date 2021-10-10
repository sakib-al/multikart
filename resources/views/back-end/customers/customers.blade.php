@extends('back-end.layout.master_back_end')

@section('master_title')Multikart - Customers @endsection
@section('page_title')Customers @endsection
@section('bread_title')Customers @endsection

@section('customers')active @endsection
@section('customer_list')active @endsection

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
                    <h5>Customer List</h5>
                </div>
                <div class="card-body">
                    <table id="customers" class="table table-striped table-bordered user-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $user)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <p><b>Country:</b> {{ $user->user_address->country ?? '' }} </p>
                                    <p><b>City:</b> {{ $user->user_address->city?? '' }} </p>
                                    <p><b>Post Code:</b> {{ $user->user_address->post_code ?? '' }} </p>
                                    <p><b>Address:</b> {{ $user->user_address->address ?? '' }}</p>
                                </td>
                                <td>{{ $user->user_address->phone_no ?? '' }}</td>
                                <td>
                                    @if($user->user_status == 1)
                                        Active
                                        @else
                                        Inactive
                                    @endif
                                </td>
                                <td class="text-center" width="15%">
                                    <a href="{{ route('user.edit',[$user->id]) }}" class="btn btn-sm btn-danger">Edit</a>
                                    <a href="{{ route('customer.view',[$user->id]) }}" class="btn btn-sm btn-primary">View</a>
                                    {{-- <a href="#" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to delete ?')">Delete</a> --}}
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
        $('#customers').DataTable();
    } );
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

@endsection
