@extends('front-end.layout.front-master')

@section('page_title')User Dashboard @endsection
@section('dashboard_account')active @endsection

@section('bread_title')Dashboard @endsection
@section('bread_subtitle')Dashboard @endsection

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
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account Information</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3><a href="#">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <h6>{{ Auth::user()->email }}</h6>
                                            <h6><a href="#">Change Password</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Newsletters</h3><a href="#">Edit</a>
                                        </div>
                                        <div class="box-content">
                                            <p>You are currently not subscribed to any newsletter.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3><a href="#">Manage Addresses</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6>Default Billing Address</h6>

                                            @if (!empty($billing->billing_address))
                                                <address>{{ $billing->address }}<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>
                                                @else
                                                <address>You have not set a default billing address.<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>Default Shipping Address</h6>
                                            @if (!empty($shipping->shipping_address))
                                                <address>{{ $shipping->address }}<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>

                                                @else
                                                <address>You have not set a default shipping address.<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>
                                            @endif

                                        </div>
                                    </div>
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
