@extends('back-end.layout.master_back_end')

@section('master_title')
    Multikart - Transection
@endsection

@section('bread_title')
    Transection
@endsection

@section('order')
active
@endsection
@section('order_cancel')
active
@endsection
@push('custom_css')
 <!-- Datatables css-->
 <link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/datatables.css') }}">
@endpush

@push('custom_js')
<!-- Datatable js-->
<script src="{{ asset('back-end/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/datatables/custom-basic.js') }}"></script>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Transection List</h5>
                </div>
                <div class="card-body order-datatable">
                    <table class="display" id="order_cancel">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order ID</th>
                                <th>Order Note</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cancel as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ route('order.view',[$item->order_master_no]) }}">ORD-{{ $item->order_id }}</a></td>
                                <td>
                                    <p>{{ $item->order_note }}</p>
                                 </td>
                                <td>
                                    {{ date('d-m-Y',strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ route('order.view',[$item->order_master_no]) }}"><i class="fa fa-eye" aria-hidden="true" title="view Order"></i></a>
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
