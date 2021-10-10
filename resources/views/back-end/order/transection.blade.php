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
@section('transection')
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
                    <table class="display" id="transection_table">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Transection ID</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transection as $item)
                            <tr>
                                <td><a href="{{ route('order.view',[$item->id]) }}">#ORD-{{ $item->order_id }}</a></td>
                                <td>
                                    {{ $item->transection_id }}
                                </td>
                                <td>
                                    {{ date('d-m-Y',strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    @if ($item->is_paid == 2)
                                    <span class="badge badge-secondary">Bkash</span>
                                    @else
                                    <span class="badge badge-secondary">COD</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_cancel == 1)
                                    <span class="badge badge-danger">Cancelled</span>
                                    @elseif ($item->is_active == 0)
                                    <span class="badge badge-warning">Processing</span>
                                    @elseif ($item->is_active == 1)
                                    <span class="badge badge-success">Order Confirmed</span>
                                    @endif
                                </td>
                                <td>{{ $item->order_sum }}.00৳</td>
                                <td>
                                    <a href="{{ route('order.view',[$item->id]) }}"><i class="fa fa-eye" aria-hidden="true" title="view Order"></i></a>
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
