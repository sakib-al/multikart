<?php

if (Cookie::get('shopping_cart')) {

$cookie_data = \stripslashes(Cookie::get('shopping_cart'));
$cart_data = \json_decode($cookie_data, true);
}else{

$cart_data = array();
}

?>

<style>
    @media only screen and (max-device-width: 580px) {
        .cart-count{
            top: -7px !important;
        }
    }
</style>

<li class="onhover-div mobile-cart">
    <div onclick="openNav()">
        <a href="{{ route('cart') }}">
            <img src="{{ asset('front-end/assets/images/jewellery/icon/cart.png') }}" class="img-fluid blur-up lazyload position-relative" alt="">
            <i class="ti-shopping-cart"></i>
            @if ($cart_data > 0)
            <div class="cart-count">{{ count($cart_data) }}</div>
            @endif
        </a>
        {{-- <i class="ti-shopping-cart" ></i> --}}
    </div>
    {{-- @if ($cart_data)
    <ul class="show-div shopping-cart short-cart-list">
        @foreach ($cart_data as $keys => $value)
        <li id="short-cart">
            <div class="media">
                <a href="#"><img class="me-3" id="prd-img"
                        src="{{asset('/')}}images/product/{{ $cart_data[$keys]["item_img"] ?? 'no-image.jpg' }}"
                        alt="Generic placeholder image"></a>
                <div class="media-body">
                    <a href="#">
                        <h5 id="prd-name">{{ $cart_data[$keys]["item_name"] }}</h5>
                    </a>
                    <input type="hidden" id="p_quantity" value="{{  $cart_data[$keys]["item_quantity"]  }}">
                    <input type="hidden" id="p_price" value="{{  $cart_data[$keys]["item_price"]  }}">

                    <h4 id="prd-quantity"><span>{{ $cart_data[$keys]["item_quantity"] }} x {{ $cart_data[$keys]["item_price"] }}৳</span></h4>
                </div>
            </div>
        </li>
        @endforeach

        <li id="subtotal">
            <div class="total">
                <h5>subtotal : <span id="cart_sub_total">0.00</span></h5>
            </div>
        </li>

        <li>
            <div class="buttons">
                <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                <a href="#" class="checkout">checkout</a>
            </div>
        </li>
    </ul>
    @else
    <ul class="show-div shopping-cart">
        <li id="subtotal">
            <div class="total">
                <h5>subtotal : <span>0.00</span></h5>
            </div>
        </li>
        <li>
            <div class="buttons">
                <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                <a href="#" class="checkout">checkout</a>
            </div>
        </li>
    </ul>
    @endif --}}
</li>
{{-- <div id="mySidenav" class="side-cart">
    <div class="cart-box-head">
        <div class="cart-title">Cart</div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>
    <div class="cart-box-item">
        <div class="cart-box-list">
            <div class="cart-img">
                <a href="#">
                    <img src="https://admin.azuramart.com/media/images/products/627/prod_17032021_60521e84aa34d.jpg" height="80" width="70" alt="">
                </a>
            </div>
            <div class="cart-media">
                <a href="#">
                    <h4 class="cart-item-title">ARMANI EXCHANGE WATCH - AX1443 - ONE SIZE</h4>
                </a>
                <h6 class="cart-price">2500.00 BDT</h6>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <input type="number" name="quantity" id="item_quantity" class="form-control input-number text-center" min="1" max="10" value="1">
                    </div>
                    <div class="col-6 col-md-6">
                        <a class="remove-cart" href="#">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-checkout">

    </div>
</div> --}}

