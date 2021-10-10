@extends('front-end.layout.front-master')

@section('page_title')Wishlist @endsection
@section('bread_subtitle')Wishlist @endsection
@section('content')
<section class="wishlist-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset('front-end/assets/images/pro3/1.jpg') }}" alt=""></a>
                            </td>
                            <td><a href="#">cotton shirt</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon me-1"><i class="ti-close"></i>
                                            </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td><a href="#" class="icon me-3"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset('front-end/assets/images/pro3/27.jpg') }}" alt=""></a>
                            </td>
                            <td><a href="#">cotton shirt</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon me-1"><i class="ti-close"></i>
                                            </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td><a href="#" class="icon me-3"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset('front-end/assets/images/pro3/35.jpg') }}" alt=""></a>
                            </td>
                            <td><a href="#">cotton shirt</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon me-1"><i class="ti-close"></i>
                                            </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td><a href="#" class="icon me-3"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="#" class="btn btn-solid">continue shopping</a> <a href="#" class="btn btn-solid">check out</a></div>
        </div>
    </div>
</section>
@endsection
