@extends('back-end.layout.master_back_end')

@section('master_title')
    Multikart - Order
@endsection

@section('bread_title')
    Order
@endsection

@section('order')
    active
@endsection
@section('order_list')
active
@endsection
@push('custom_css')
 <!-- Datatables css-->
 <link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/datatables.css') }}">
@endpush


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Order</h5>
                </div>
                <div class="card-body order-datatable">
                    <table class="display table-responsive-sm" id="order-list">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Product</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order_list)
                            <tr>
                                <td>#ORD-{{ $order_list->order_id }}</td>
                                <td>
                                    <div class="d-flex">
                                        @foreach ($order_list->OrderImage as $image)
                                        <img src="{{asset('/')}}images/product/{{ $image->product_image ?? 'no-image.jpg' }}" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    @if ($order_list->is_cod == 1)
                                    <span class="badge badge-secondary">Cash On Delivery</span>
                                    @elseif ($order_list->is_paid == 2)
                                    <span class="badge badge-success">Paid</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($order_list->is_paid == 2)
                                    <span class="badge badge-secondary">Bkash</span>
                                    @else
                                    <span class="badge badge-secondary">COD</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($order_list->is_cancel == 1)
                                    <span class="badge badge-danger">Cancelled</span>
                                    @elseif ($order_list->is_active == 0)
                                    <span class="badge badge-warning">Processing</span>
                                    @elseif ($order_list->is_active == 1)
                                    <span class="badge badge-success">Order Confirmed</span>
                                    @endif
                                </td>
                                <td>{{ date('d M Y',strtotime($order_list->created_at)) }}</td>
                                <td>{{ $order_list->order_sum }}.00৳</td>
                                <td>
                                    <a href="{{ route('order.view',[$order_list->id]) }}"><i class="fa fa-sliders" aria-hidden="true" title="Edit Order"></i></a>
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

@push('custom_js')
<!-- Datatable js-->
<script src="{{ asset('back-end/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/datatables/custom-basic.js') }}"></script>
@endpush
