@extends('front-end.layout.front-master')

@section('page_title')User Dashboard @endsection
@section('dashboard_order')active @endsection

@section('bread_title')Dashboard @endsection
@section('bread_subtitle')My Order @endsection

@push('custom_css')
<style>
    .box-head .date{
        position: absolute;
        right: 0;
        bottom: 15px;
        font-size: 16px;
        font-weight: 600;
        color: #222;
    }
    .order-details table{margin-top: 25px;}
    .order-details .table_header{background-color: #ccc;}
    .order-details .table_detail{vertical-align: middle;}
    .order-summary{margin-top: 50px;}
    .cancel-form{display: none}
</style>
@endpush


@section('content')
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                aria-hidden="true"></i> back</span></div>
                    <div class="block-content">
                        @include('front-end.layout.user_dashboard_nav')
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        {{-- <div class="page-title">
                            <h2>My Dashboard</h2>
                        </div> --}}
                        <div class="box-account box-info">
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <div class="box-head">
                                            <h2>Order #ORD-{{ $info->order_id }}</h2>
                                            <h3 class="date">Date: {{ date('d M Y',strtotime($info->created_at)) }}</h3>
                                        </div>
                                    </div>
                                    <div class="order-details">
                                        <table class="table">
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
                                                @foreach ($view as $orders)
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
                                    <div class="order-summary">
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
                                                <td style="width: 30%; text-align: right;">{{ $info->product_subtotal }}.00৳</td>
                                              </tr>
                                              <tr>
                                                <td style="width: 70%; text-align: right;">Delivery Cost</td>
                                                <td style="width: 30%; text-align: right;">{{ $info->delivery_cost }}.00৳</td>
                                              </tr>
                                              <tr>
                                                <td style="width: 70%; text-align: right;"><b>Total</b></td>
                                                <td style="width: 30%; text-align: right;"><b>{{ $info->order_sum }}.00৳</b></td>
                                              </tr>
                                              @if ($info->is_cod == 1)
                                              <tr>
                                                <td style="width: 70%; text-align: right;"><strong class="text-danger">Due</strong></td>
                                                <td style="width: 30%; text-align: right;"><strong class="text-danger">{{ $info->order_sum }}.00৳</strong></td>
                                              </tr>
                                              @elseif ($info->is_paid == 2)
                                              <tr>
                                                <td style="width: 70%; text-align: right;"><strong class="text-danger"></strong></td>
                                                <td style="width: 30%; text-align: right;"><strong class="text-success">PAID</strong></td>
                                              </tr>
                                              @endif
                                              @if ($info->is_cancel == 1)
                                              <tr>
                                                <td style="width: 70%; text-align: right;"><strong class="text-danger"></strong></td>
                                                <td style="width: 30%; text-align: right;"><strong class="btn btn-danger">Order Cancelled</strong></td>
                                              </tr>
                                              @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if ($info->is_cancel == 0)
                                    @if ($info->cancel_request == 1)
                                    <tr>
                                        <td style="width: 70%; text-align: right;"><strong class="text-danger"></strong></td>
                                        <td style="width: 30%; text-align: right;"><button class="btn btn-danger">Cancel Request Sent</button></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td style="width: 70%; text-align: right;"><strong class="text-danger"></strong></td>
                                        <td style="width: 30%; text-align: right;"><button class="btn btn-danger" id="order_cancel">Order Cancel Request</button></td>
                                    </tr>
                                    @endif
                                @endif

                                <div class="cancel-form">
                                    <form action="{{ route('order.cancel.request',[$info->id]) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Order Cancel Note</label>
                                                    {!! Form::textarea('order_note', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '12']) !!}
                                                </div>
                                                <button type="submit" class="btn btn-danger">Send Cancel Request</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom_js')
<script>
    $("#order_cancel").on('click', function() {
    $('.cancel-form').show();
    $('#order_cancel').hide();

});
</script>
@endpush


