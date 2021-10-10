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

                                            <div class="pt-2">
                                                <form action="{{ route('user.address.update') }}" method="POST">
                                                    @csrf
                                                    <input name="address_id_billing" type="hidden" value="{{ $billing->id ?? 0}}">
                                                    <div class="row">
                                                        <div class="col-3 pt-2"><h6 class="text-dark">First Name: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="text" name="first_name" value="{{ $billing->first_name ?? '' }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Last Name: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="text" name="last_name" value="{{ $billing->last_name ?? '' }}" class="form-control" required>
                                                        </div>
                                                        <div class="col-3 pt-2">
                                                            <h6 class="text-dark">Country: &nbsp;&nbsp;</h6>
                                                        </div>
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('country_id', $country, 2, ['placeholder' => 'Select Country', 'class' => 'form-control', 'id' => 'country_id', 'required',]) !!}
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">City: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('city_id', $city, $billing->city_id ?? null, [ 'class' => 'form-control', 'id' => 'city_id', 'required', 'data-type'=>'billing_address']) !!}
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Area: &nbsp;&nbsp;</h6></div>

                                                        @if (isset($billing->city_id) && $billing->city_id > 0)
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('area_id',  $billingarea, $billing->area_id, [ 'class' => 'form-control', 'id' => 'billing_area_id', 'required']) !!}
                                                        </div>
                                                        @else
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('area_id',  array(), null, [ 'class' => 'form-control', 'id' => 'billing_area_id', 'required']) !!}
                                                        </div>
                                                        @endif
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Post Code: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="text" name="post_code" value="{{ $billing->post_code ?? '' }}" class="form-control">
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Phone: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2"><input type="text" minlength="11" maxlength="11" name="phone_no" required value="{{ $billing->phone_no ?? '' }}" class="form-control"></div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Address: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2"><input type="text" name="address" value="{{ $billing->address ?? '' }}" class="form-control"></div>
                                                        <input class="shipping_id" type="hidden" name="shipping_id" value="1">
                                                    </div>
                                                    <button class="small_button mt-3 f-right" type="submit">Save Address</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 shipping_form">
                                            <h6 class="short_title">Default Shipping Address</h6>

                                            <div class="pt-2">
                                                <form action="{{ route('user.address.update') }}" method="POST">
                                                    @csrf
                                                    <input name="address_id_shipping" type="hidden" value="{{ $shipping->id ?? 0 }}">
                                                    <div class="row">
                                                        <div class="col-3 pt-2"><h6 class="text-dark">First Name: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="text" name="first_name" value="{{ $shipping->first_name ?? '' }}" class="form-control">
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Last Name: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            <input type="text" name="last_name" value="{{ $shipping->last_name ?? '' }}" class="form-control">
                                                        </div>
                                                        <div class="col-3 pt-2">
                                                            <h6 class="text-dark">Country: &nbsp;&nbsp;</h6>
                                                        </div>
                                                        <div class="col-9 pt-2">
                                                            {{-- <input type="text" name="country" value="{{ $billing->country ?? '' }}" class="form-control"> --}}
                                                            {!! Form::select('country_id', $country, 2, ['placeholder' => 'Select Country', 'class' => 'form-control', 'id' => 'country_id', 'required',]) !!}
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">City: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('city_id', $city, $shipping->city_id ?? null, [ 'class' => 'form-control', 'id' => 'city_id', 'required', 'data-type'=>'shipping_address']) !!}
                                                        </div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Area: &nbsp;&nbsp;</h6></div>

                                                        @if (isset($shipping->city_id) && $shipping->city_id > 0)
                                                        <div class="col-9 pt-2">
                                                            {!! Form::select('area_id',  $shippingarea, $shipping->area_id, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                        </div>
                                                        @else
                                                        <div class="col-9 pt-2">
                                                        {!! Form::select('area_id',  array(), null, [ 'class' => 'form-control', 'id' => 'shipping_area_id', 'required']) !!}
                                                        </div>
                                                        @endif

                                                        <div class="col-3 pt-2"><h6 class="text-dark">Post Code: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2"><input type="number" name="post_code" value="{{ $shipping->post_code ?? '' }}"class="form-control"></div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Phone: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2"><input type="text" maxlength="11" name="phone_no" required value="{{ $shipping->phone_no ?? '' }}" class="form-control"></div>
                                                        <div class="col-3 pt-2"><h6 class="text-dark">Address: &nbsp;&nbsp;</h6></div>
                                                        <div class="col-9 pt-2"><input type="text" name="address" value="{{ $shipping->address ?? '' }}" class="form-control"></div>
                                                        <input class="billing_id" type="hidden" name="shipping_id" value="1">
                                                    </div>
                                                    <button class="small_button mt-3 f-right" type="submit">Save Address</button>
                                                </form>
                                            </div>
                                        </div>
                                        @if (!isset($shipping->shipping_address) || (isset($shipping->shipping_address) && $shipping->shipping_address= null))
                                        <div class="check">
                                            <input type="checkbox" class="shipping_check">
                                            <p>Check if billing address & shipping address are same</p>
                                        </div>
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
</section>
@endsection

@push('custom_js')
    <script src="{{ asset('back-end/assets/js/back-panel/location.js') }}"></script>
    <script>
        $(".shipping_check").click(function() {
            if($(this).is(":checked")) {
                $(".shipping_form").hide();
                $(".shipping_id").val(1);
            } else {
                $(".shipping_form").show();
            }
        });
    </script>
@endpush
