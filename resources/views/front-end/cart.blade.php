@extends('front-end.layout.front-master')

@section('page_title')My Cart @endsection
@section('bread_title')My Cart @endsection
@section('bread_subtitle')My Cart Item @endsection

@push('custom_css')
    <style>
        .cart i{
            font-size: 100px;
            color: #5fcbc4;
        }
        .remove{
            display: none;
        }
        .price-menu .discount-value{
            font-size: 13px;
            font-weight: 600;
            color: #5fcbc4;
            position: absolute;
        }
    </style>
@endpush
@section('content')
<?php

if (Cookie::get('shopping_cart')) {

$cookie_data = \stripslashes(Cookie::get('shopping_cart'));
$cart_data = \json_decode($cookie_data, true);
}else{

$cart_data = array();
}
?>
<section class="cart-section section-b-space">
    @if (!empty($cart_data))
    <div class="container" id="cart_body">
        <div class="row">
            <div class="col-sm-12">
                <div class="cart_counter">
                    <div class="countdownholder">
                        {{-- <span id="timer"></span> --}}
                        Your cart will be expired in 24 hours!
                    </div>
                    <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">check out</a>
                </div>
            </div>
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_data as $keys => $value)
                        @php
                            $main_price      = $cart_data[$keys]["item_price"];
                            $discount_status = $cart_data[$keys]["item_discount"];
                            $discount_end    = $cart_data[$keys]["item_discount_end"];

                            if (date("Y-m-d") <= $discount_end) {
                                if ($discount_status == 1) {
                                    $discount        = $cart_data[$keys]["item_discount_value"];
                                    $discount_price  = ($main_price * $discount) / 100;
                                }
                            }else {
                                $discount_price  = 0;
                            }
                            $net_price  = $main_price - $discount_price;
                        @endphp
                        <tr class="cart_page" id="cart_page" >
                            <td>
                                <a href="#"><img src="{{asset('/')}}images/product/{{ $cart_data[$keys]["item_img"] ?? 'no-image.jpg' }}" alt=""></a>
                            </td>
                            <td><a href="#">{{ $cart_data[$keys]["item_name"] }}</a>
                                <div class="mobile-cart-content row">
                                    <input type="hidden" class="product_id" value="{{ $cart_data[$keys]["item_id"] }}">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number" id="item_quantity" value="{{ $cart_data[$keys]["item_quantity"] }}" min="1" max="10" data-pk="{{ $cart_data[$keys]["item_id"] }}">
                                                {!! Form::hidden('price', $net_price, ['id'=>'price']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            @if (date("Y-m-d") <= $discount_end )
                                            @if ($discount_status == 1)
                                                <span>৳{{ $net_price }}</span>
                                                <span><del>৳{{ $cart_data[$keys]["item_price"] }}</del></span>
                                                <span class="discount-value">{{ $discount }}%</span>
                                            @endif
                                            @else
                                            <span>৳{{ $cart_data[$keys]["item_price"] }}</span>
                                        @endif
                                        </h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon"><i id="delete_cart_data" class="ti-close" onclick="return confirm('Are you sure you want to delete ?')"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="price-menu">
                                    @if (date("Y-m-d") <= $discount_end )
                                        @if ($discount_status == 1)
                                            <span>৳{{ $net_price }}</span>
                                            <span><del>৳{{ $cart_data[$keys]["item_price"] }}</del></span>
                                            <span class="discount-value">{{ $discount }}%</span>
                                        @endif
                                        @else
                                        <span>৳{{ $cart_data[$keys]["item_price"] }}</span>
                                    @endif
                                </h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" id="item_quantity" class="form-control input-number" min="1" max="10" value="{{ $cart_data[$keys]["item_quantity"] }}" data-pk="{{ $cart_data[$keys]["item_id"] }}">
                                        {!! Form::hidden('price', $net_price, ['id'=>'price']) !!}
                                    </div>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="icon"><i id="delete_cart_data" class="ti-close" onclick="return confirm('Are you sure you want to delete ?')"></i></a></td>
                            <td>
                                <h2 class="td-color ">৳<span class="unit_total_price">{{ $net_price * $cart_data[$keys]["item_quantity"] }}.00</span></h2>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2 id="sub_total"></h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{ route('index') }}" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{ route('checkout') }}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
    @else
        <div class="empty_cart mb-4">
            <div class="text-center">
                <div class="cart mb-4">
                    <i class="ti-shopping-cart"></i>
                </div>
                <h3>OPPS! Your cart is empty</h3>
            </div>
        </div>
        <div class="text-center"><a href="{{ route('index') }}" class="btn btn-solid">continue shopping</a></div>
    @endif

</section>
@endsection

@push('custom_js')
  <script src="{{ asset('front-end/assets/js/timer1.js') }}"></script>
  <script src="{{ asset('front-end/assets/js/add-to-cart.js') }}"></script>
@endpush
