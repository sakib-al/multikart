@extends('front-end.layout.front-master')

@section('page_title')User Dashboard @endsection
@section('dashboard_address')active @endsection

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
                        {{-- <div class="page-title">
                            <h2>My Dashboard</h2>
                        </div> --}}
                        <div class="box-account box-info">
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3><a href="#">Manage Addresses</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="short_title">Default Billing Address</h6>
                                            @if (!empty($billing->billing_address))
                                                <div class="pt-2">
                                                    <h6 class="text-dark">Name: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->first_name }}&nbsp;{{ $billing->last_name }}</span></h6>
                                                    <h6 class="text-dark">Country: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->country }}</span></h6>
                                                    <h6 class="text-dark">City: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->city }}</span></h6>
                                                    <h6 class="text-dark">Area: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->area }}</span></h6>
                                                    <h6 class="text-dark">Post Code: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->post_code }}</span></h6>
                                                    <h6 class="text-dark">Phone: &nbsp;&nbsp;<span class="text-secondary">{{ $billing->phone_no }}</span></h6>
                                                    <h6 class="text-dark">Address: &nbsp;&nbsp;<span class="text-secondary"> {{ $billing->address }}</span></h6>
                                                    <a href="{{ route('user.address.edit') }}">Edit Address</a>
                                                </div>
                                                @else
                                                <address>You have not set a default billing address.<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="short_title">Default Shipping Address</h6>
                                            @if (!empty($shipping->shipping_address))
                                                <div class="pt-2">
                                                    <h6 class="text-dark">Name: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->first_name }}&nbsp;{{ $shipping->last_name }}</span></h6>
                                                    <h6 class="text-dark">Country: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->country }}</span></h6>
                                                    <h6 class="text-dark">City: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->city }}</span></h6>
                                                    <h6 class="text-dark">Area: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->area }}</span></h6>
                                                    <h6 class="text-dark">Post Code: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->post_code }}</span></h6>
                                                    <h6 class="text-dark">Phone: &nbsp;&nbsp;<span class="text-secondary">{{ $shipping->phone_no }}</span></h6>
                                                    <h6 class="text-dark">Address: &nbsp;&nbsp;<span class="text-secondary"> {{ $shipping->address }}</span></h6>
                                                    <a href="{{ route('user.address.edit') }}">Edit Address</a>
                                                </div>
                                                @else
                                                <address class="pt-2">You have not set a default shipping address.<br><a href="{{ route('user.address.edit') }}">Edit Address</a></address>
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
