@extends('front-end.layout.front-master')

@section('page_title')User Dashboard @endsection
@section('dashboard_password')active @endsection

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
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>Address Book</h3><a href="#">Manage Addresses</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="short_title">Default Billing Address</h6>

                                            <div class="pt-2">
                                                <form action="{{ route('user.address.update') }}" method="POST">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Old Password: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="password" name="old_password" value="" class="form-control" required>
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">New Password: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="password" name="new_password" value="" class="form-control" required>
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Confirm Password: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="password" name="confirm_password" value="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <button class="small_button mt-3 f-right" type="submit">Save Address</button>
                                                </form>
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
    </div>
</section>
@endsection
