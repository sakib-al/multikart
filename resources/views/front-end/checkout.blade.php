@extends('front-end.layout.front-master')

@section('page_title')Checkout @endsection
@section('bread_title')Checkout @endsection
@section('bread_subtitle')Checkout @endsection

@push('custom_css')
<style>
.box-border{
border: 1px solid #ddd;
border-style: dashed;
padding: 30px;
}
.box-border h6{font-size: 16px;}
.update-shipping{
    display: none;
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
$subtotal = 0;
?>
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Shipping Address Details</h3>
                            </div>
                            <div class="address-box">
                                <div class="box-border">
                                @if (!empty($address->shipping_address))
                                <h6 class="short_title">Default Shipping Address</h6>
                                    <div class="pt-2" id="shipping-detail">
                                        <h6 class="text-dark">Name: &nbsp;&nbsp;<span class="text-secondary">{{ $address->first_name }}&nbsp;{{ $address->last_name }}</span></h6>
                                        <h6 class="text-dark">Country: &nbsp;&nbsp;<span class="text-secondary">{{ $address->country }}</span></h6>
                                        <h6 class="text-dark">City: &nbsp;&nbsp;<span class="text-secondary">{{ $address->city }}</span></h6>
                                        <h6 class="text-dark">Area: &nbsp;&nbsp;<span class="text-secondary">{{ $address->area }}</span></h6>
                                        <h6 class="text-dark">Post Code: &nbsp;&nbsp;<span class="text-secondary">{{ $address->post_code }}</span></h6>
                                        <h6 class="text-dark">Phone: &nbsp;&nbsp;<span class="text-secondary">{{ $address->phone_no }}</span></h6>
                                        <h6 class="text-dark">Address: &nbsp;&nbsp;<span class="text-secondary"> {{ $address->address }}</span></h6>
                                        <button id="change_address" class="btn btn-solid">Change Address</button>
                                    </div>
                                    @else
                                    <div class="check-out" id="new_shipping">

                                        <form action="{{ route('user.address.update') }}" method="post">
                                            <div class="row">
                                                @csrf
                                            {{-- For Checkout Return --}}
                                            <input type="hidden" name="checkout_return" value="1">

                                            <input name="address_id_shipping" type="hidden" value="{{ $address->id ?? 0 }}">
                                            <input class="shipping_id" type="hidden" name="shipping_id" value="1">
                                            <input class="billing_id" type="hidden" name="billing_id" value="0">
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">First Name</div>
                                                <input type="text" name="first_name" value="{{ $address->first_name ?? '' }}" placeholder="Enter your first name" required>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Last Name</div>
                                                <input type="text" name="last_name" value="{{ $address->last_name ?? '' }}" placeholder="Enter your last name" required>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Country</div>
                                                {!! Form::select('country_id', $country, 2, ['placeholder' => 'Select Country', 'class' => 'form-control', 'id' => 'country_id', 'required',]) !!}
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">City</div>
                                                {!! Form::select('city_id', $city, $address->city_id ?? null, [ 'class' => 'form-control', 'id' => 'city_id', 'required', 'data-type'=>'shipping_address']) !!}
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Area</div>
                                                @if (isset($shipping->city_id) && $shipping->city_id > 0)
                                                {!! Form::select('area_id',  $shippingarea, $shipping->area_id, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                @else
                                                {!! Form::select('area_id',  array(), null, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Phone</div>
                                                <input type="text" name="phone_no" value="{{ $address->phone_no ?? '' }}" placeholder="EX- 01821478921" maxlength="14" required>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">Postal Code</div>
                                                <input type="text" name="post_code" value="{{ $address->post_code ?? '' }}" placeholder="EX- 1201" maxlength="6" required>
                                            </div>

                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Address</div>
                                                <input type="text" name="address" value="{{ $address->address?? '' }}" placeholder="Street address" required>
                                            </div>

                                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-solid">Save Address</button>
                                            </div>
                                            </div>

                                        </form>
                                    </div>
                                    @endif
                                    <div class="update-shipping">
                                        <form action="{{ route('user.address.update') }}" method="POST">
                                            <div class="row check-out">
                                                @csrf
                                                {{-- For Checkout Return --}}
                                                <input type="hidden" name="checkout_return" value="1">
                                                <input name="address_id_shipping" type="hidden" value="{{ $address->id ?? 0 }}">
                                                <input class="shipping_id" type="hidden" name="shipping_id" value="1">
                                                <input class="billing_id" type="hidden" name="billing_id" value="0">

                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">First Name</div>
                                                    <input type="text" name="first_name" value="{{ $address->first_name ?? '' }}" placeholder="Enter your first name" required>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">Last Name</div>
                                                    <input type="text" name="last_name" value="{{ $address->last_name ?? '' }}" placeholder="Enter your last name" required>
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Country</div>
                                                    {!! Form::select('country_id', $country, 2, ['placeholder' => 'Select Country', 'class' => 'form-control', 'id' => 'country_id', 'required',]) !!}
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">City</div>
                                                    {!! Form::select('city_id', $city, $address->city_id ?? null, [ 'class' => 'form-control', 'id' => 'city_id', 'required', 'data-type'=>'shipping_address']) !!}
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Area</div>
                                                    @if (isset($address->city_id) && $address->city_id > 0)
                                                    {!! Form::select('area_id',  $shippingarea, $address->area_id, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                    @else
                                                    {!! Form::select('area_id',  array(), null, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">Phone</div>
                                                    <input type="text" name="phone_no" value="{{ $address->phone_no ?? '' }}" placeholder="EX- 01821478921" maxlength="14" required>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                    <div class="field-label">Postal Code</div>
                                                    <input type="text" name="post_code" value="{{ $address->post_code ?? '' }}" placeholder="EX- 1201" maxlength="6" required>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-label">Address</div>
                                                    <input type="text" name="address" value="{{ $address->address?? '' }}" placeholder="Street address" required>
                                                </div>


                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <button type="submit" class="btn btn-solid">Save Address</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">

                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">

                                        @foreach ($cart_data as $keys => $value)
                                            @php
                                                $main_price         = $cart_data[$keys]["item_price"];
                                                $discount_status    = $cart_data[$keys]["item_discount"];
                                                $discount_end       = $cart_data[$keys]["item_discount_end"];

                                                if (date("Y-m-d") <= $discount_end) {
                                                    if ($discount_status == 1) {
                                                        $discount        = $cart_data[$keys]["item_discount_value"];
                                                        $discount_price  = ($main_price * $discount) / 100;
                                                    }
                                                }else {
                                                    $discount_price  = 0;
                                                }

                                                $net_price          = $main_price - $discount_price;
                                                $subtotal += $net_price * $cart_data[$keys]["item_quantity"];
                                            @endphp
                                            <li>{{ $cart_data[$keys]["item_name"] }} × {{ $cart_data[$keys]["item_quantity"] }}

                                                <span>{{ $net_price * $cart_data[$keys]["item_quantity"] }}.00৳</span>
                                            </li>

                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">{{ $subtotal }}.00৳</span></li>
                                        <li>Shipping Cost
                                            <span class="count text-right">{{ $delcost->delivery_cost ?? 0 }}.00৳</span>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        @php
                                            $grand_total = $subtotal + ($delcost->delivery_cost ?? 0);
                                        @endphp
                                        <li>Total <span class="count">{{ $grand_total }}.00৳</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <form action="{{ route('order.place') }}" method="post">
                                            @csrf
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" id="payment-2" value="1" required >
                                                            <label for="payment-2">Cash On Delivery</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment_type" id="payment-3" data-bs-toggle="modal" data-bs-target="#CoDModal" value="2" required>
                                                            <label for="payment-3">Bkash</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('front-end.layout.includes.payment-method')
                                            @if (isset($address->shipping_address) && $address->shipping_address > 0)
                                            <div class="text-end"><button type="submit" class="btn-solid btn">Place Order</button></div>
                                            @endif
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
    <!-- section end -->
@endsection

@push('custom_js')
<script src="{{ asset('back-end/assets/js/back-panel/location.js') }}"></script>
<script>
$("#change_address").click(function(){
  $("#shipping-detail").hide();
  $(".update-shipping").show();
});

</script>
@endpush
