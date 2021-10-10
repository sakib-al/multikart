@extends('back-end.layout.master_back_end')

@section('master_title')
    Multikart - ORD-{{ $order->order_id }}
@endsection

@section('page_title')
Order Details
@endsection

@section('bread_title')
    ORD-{{ $order->order_id }}
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
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="product-adding">
        <div class="row product-adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="customer-info">Order Info</h5>
                        <div class="info-box">
                            <h4>{{ $order->customer_name }}</h4>
                            <h6>Mob: {{ $order->customer_mobile }}</h6>
                        </div>
                        <div class="order-info">
                            <h6>ORDER NO: <span>ORD-{{ $order->order_id }}</span></h6>
                            <h6>ORDER Date: <span>{{ date('d-m-Y',strtotime($order->created_at)) }}</span></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="customer-address">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="address-box">
                                        <div class="address-box-header">Shipping Address</div>
                                        <div class="address-info">
                                            <p>{{ $order->customer_name }}</p>
                                            <p>{{ $order->form_city }}</p>
                                            <p>{{ $order->from_postcode }}, {{ $order->from_area }}.</p>
                                            <p>{{ $order->customer_address }}</p>
                                            <p>Contact No: {{ $order->customer_mobile }}</p>

                                        </div>
                                    </div>
                                </div>
                                @if ($order->cancel_request == 1)
                                <div class="col-md-6">
                                    <div class="address-box">
                                        <div class="address-box-header header-danger">Order Cancel Request</div>
                                        <div class="address-info">
                                            <p>{{ $cancel->order_note }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="order-details mt-5">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr class="table_header">
                                    <th style="width: 15%" scope="col">Product</th>
                                    <th style="width: 40%" scope="col">Product Name</th>
                                    <th style="width: 10%" scope="col">Unit Price</th>
                                    <th style="width: 10%" scope="col">Qty</th>
                                    <th style="width: 10%" scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($info as $orders)
                                    <tr class="table_detail">
                                        <td><img src="{{asset('/')}}images/product/{{ $orders->product_image ?? 'no-image.jpg' }}" width="60" alt=""></td>
                                        <td>{{ $orders->product_name }}</td>
                                        <td>{{ $orders->regular_price }}.00৳</td>
                                        <td>{{ $orders->product_qty }}</td>
                                        <td>{{ $orders->product_subtotal }}.00৳</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="order-summary mt-5">
                            <table class="table">
                                <thead>
                                    <tr class="table_header">
                                    <th style="width: 70%; text-align: right;"scope="col">Summary</th>
                                    <th style="width: 30%; text-align: right;"scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td style="width: 70%; text-align: right;">Product Subtotal</td>
                                    <td style="width: 30%; text-align: right;">{{ $order->product_subtotal }}.00৳</td>
                                    </tr>
                                    <tr>
                                    <td style="width: 70%; text-align: right;">Delivery Cost</td>
                                    <td style="width: 30%; text-align: right;">{{ $order->delivery_cost }}.00৳</td>
                                    </tr>
                                    <tr>
                                    <td style="width: 70%; text-align: right;"><b>Total</b></td>
                                    <td style="width: 30%; text-align: right;"><b>{{ $order->order_sum }}.00৳</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-approval text-right">

                            @if ($order->is_cancel == 0)
                            <a href="{{ route('order.confirm',[$order->id]) }}" class="btn btn-primary">Confirm Order</a>
                            <a href="{{ route('order.cancel',[$order->id]) }}" class="btn btn-danger">Cancel Order</a>
                            @else
                            <button class="btn btn-danger">Order Cancelled</button>

                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
