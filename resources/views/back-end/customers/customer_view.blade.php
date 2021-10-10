@extends('back-end.layout.master_back_end')

@section('master_title')
    Multikart - Customer
@endsection

@section('order')
    active
@endsection

@push('custom_css')
<style>
    .customer-info{
        border-bottom: 1px solid #7777;
        padding-bottom: 10px;
        text-align: center;
    }
    .info-box{
        text-align: center;
        margin-top: 20px;
        position: relative;
    }
    .info-box h4{
        font-size: 35px;
        font-weight: 600;
    }
    .info-box h6{
        font-size: 16px;
        font-weight: 600;
    }
    .order-info{
        position: absolute;
        top: 80px;
        right: 3%;
    }
    .order-info h6{font-weight: 600}
    .order-info span{font-weight: 500}
    .address-box{
        border: 1px solid #cccc;
        border-radius: 5px;
    }
    .address-box-header{
        padding: 10px;
        background-color: #ccc;
        text-transform: uppercase;
        font-weight: 600;
    }
    .address-info{padding: 10px;}
    .address-info p{line-height: 1.3em;}
    .order-details table{margin-top: 25px;}
    .order-details .table_header{background-color: #ccc;}
    .order-details .table_detail{vertical-align: middle;}
    .address-box-header.header-danger {
    background-color: #e06969;
    color: #fff;
    }
    .order-summary{margin-top: 50px;}
    .breadcrumb{display: none}
</style>
 <!-- Datatables css-->
 <link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/datatables.css') }}">
@endpush

@section('content')
<div class="container-fluid">

    <div class="product-adding">
        <div class="row product-adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="customer-info">Customer Info</h5>
                        <div class="info-box">
                            <h4>Mijba Uddin</h4>
                            <h6>Email: Sakib129@gmail.com</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 xl-50">
                                <div class="card o-hidden widget-cards">
                                    <div class="bg-warning card-body">
                                        <div class="media static-top-widget row">
                                            <div class="icons-widgets col-4">
                                                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                            </div>
                                            <div class="media-body col-8"><span class="m-0">Total Transection</span>
                                                <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 xl-50">
                                <div class="card o-hidden  widget-cards">
                                    <div class="bg-secondary card-body">
                                        <div class="media static-top-widget row">
                                            <div class="icons-widgets col-4">
                                                <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                            </div>
                                            <div class="media-body col-8"><span class="m-0">Total Order</span>
                                                <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 xl-50">
                                <div class="card o-hidden widget-cards">
                                    <div class="bg-primary card-body">
                                        <div class="media static-top-widget row">
                                            <div class="icons-widgets col-4">
                                                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                                            </div>
                                            <div class="media-body col-8"><span class="m-0">Total Order Cancel</span>
                                                <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-address">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="address-box">
                                        <div class="address-box-header">Billing Address</div>
                                        <div class="address-info">
                                            <p>Mijba Uddin</p>
                                            <p>Dhaka</p>
                                            <p>7550, New Market.</p>
                                            <p>Millon Baby's Smart, Chandrima Market, New Market, Dhaka.</p>
                                            <p>Contact No: 01717637547</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="address-box">
                                        <div class="address-box-header">Shipping Address</div>
                                        <div class="address-info">
                                            <p>Mijba Uddin</p>
                                            <p>Dhaka</p>
                                            <p>7550, New Market.</p>
                                            <p>Millon Baby's Smart, Chandrima Market, New Market, Dhaka.</p>
                                            <p>Contact No: 01717637547</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-details mt-5">
                            <table class="display table-responsive-sm" id="user-order-list">
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
                                    {{-- @foreach ($order as $order_list) --}}
                                    <tr>
                                        <td><a href="#">#ORD-4514</a></td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- @foreach ($order_list->OrderImage as $image)
                                                <img src="{{asset('/')}}images/product/{{ $image->product_image ?? 'no-image.jpg' }}" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                                @endforeach --}}
                                            </div>
                                        </td>
                                        <td>
                                            {{-- @if ($order_list->is_cod == 1)
                                            <span class="badge badge-secondary">Cash On Delivery</span>
                                            @elseif ($order_list->is_paid == 2)
                                            <span class="badge badge-success">Paid</span>
                                            @endif --}}
                                        </td>
                                        <td>
                                            {{-- @if ($order_list->is_paid == 2)
                                            <span class="badge badge-secondary">Bkash</span>
                                            @else
                                            <span class="badge badge-secondary">COD</span>
                                            @endif --}}
                                        </td>
                                        <td>
                                            {{-- @if ($order_list->is_cancel == 1)
                                            <span class="badge badge-danger">Cancelled</span>
                                            @elseif ($order_list->is_active == 0)
                                            <span class="badge badge-warning">Processing</span>
                                            @elseif ($order_list->is_active == 1)
                                            <span class="badge badge-success">Order Confirmed</span>
                                            @endif --}}
                                        </td>
                                        <td>14-05-21</td>
                                        <td>1440.00৳</td>
                                        <td>
                                            <a href="#"><i class="fa fa-sliders" aria-hidden="true" title="Edit Order"></i></a>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
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
