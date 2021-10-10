<?php

namespace App\Http\Controllers\Front;

use App\User;
use App\Model\Area;
use App\Model\City;
use App\Model\Country;
use App\Model\OrderMaster;
use App\Model\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\OrderDetails;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function __construct(Country $country, City $city, Area $area)
    {
        $this->city = $city;
        $this->area = $area;
        $this->country = $country;
    }

    public function dashboard()
    {
        $user    = Auth::user()->id;
        $billing = UserAddress::where('user_id',$user)->where('billing_address',1)->first();
        $shipping = UserAddress::where('user_id',$user)->where('shipping_address',1)->first();

        return view('front-end.dashboard.front-dashboard')->withBilling($billing)->withShipping($shipping);
    }

    public function user_address()
    {
        $user    = Auth::user()->id;
        $billing = UserAddress::where('user_id',$user)->where('billing_address',1)->first();
        $shipping = UserAddress::where('user_id',$user)->where('shipping_address',1)->first();

        return view('front-end.dashboard.user-address')->withBilling($billing)->withShipping($shipping);
    }

    public function user_address_edit()
    {
        $billing_area = [];
        $shipping_area = [];
        $user    = Auth::user()->id;
        $country = $this->country->getCountryCombo();
        $city    = $this->city->getCityCombo();
        $billing = UserAddress::where('user_id',$user)->where('billing_address',1)->first();
        $shipping = UserAddress::where('user_id',$user)->where('shipping_address',1)->first();

        if (isset($billing->city_id) && $billing->city_id > 0) {
            $area = Area::where('city_id',$billing->city_id)->get();
            foreach ($area as $key => $value) {
                $billing_area[$value->id] = $value->area_name;
            }
        }
        if (isset($shipping->city_id) && $shipping->city_id > 0) {
            $area = Area::where('city_id',$shipping->city_id)->get();
            foreach ($area as $key => $value) {
                $shipping_area[$value->id] = $value->area_name;
            }
        }
        return view('front-end.dashboard.user_address_edit')
        ->withBilling($billing)
        ->withShipping($shipping)
        ->withCountry($country)
        ->withCity($city)
        ->withBillingarea($billing_area)
        ->withShippingarea($shipping_area);
    }

    public function user_address_update(Request $request)
    {
        DB::beginTransaction();
        try{


            if ($request->address_id_billing > 0) {
                $address = UserAddress::find($request->address_id_billing);
            }else{
                $address = new UserAddress();
            }

            if($request->address_id_shipping > 0){
                $address = UserAddress::find($request->address_id_shipping);
            }else{
                $address = new UserAddress();
            }

            $get_country         = Country::where('id',$request->country_id)->first();
            $get_city            = City::where('id',$request->city_id)->first();
            $get_area            = Area::where('id',$request->area_id)->first();

            $address->user_id    = Auth::user()->id;
            $address->first_name = $request->first_name;
            $address->last_name  = $request->last_name ;
            $address->country_id = $request->country_id;
            $address->city_id    = $request->city_id;
            $address->area_id    = $request->area_id;
            $address->country    = $get_country->name;
            $address->city       = $get_city->city_name;
            $address->area       = $get_area->area_name;
            $address->post_code  = $request->post_code;
            $address->phone_no   = $request->phone_no;
            $address->address    = $request->address;
            $address->billing_address = $request->billing_id;

            if (empty($request->shipping_id)) {
                $address->shipping_address = null;
            }else{
                $address->shipping_address = $request->shipping_id;
            }

            $address->save();
        }catch(\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();
        if ($request->checkout_return == 1) {
            return redirect()->route('checkout');
        }else{
            return redirect()->route('user.address');
        }

    }

    public function getArea($id)
    {
        $get_area  = Area::select('id','area_name')->where('city_id',$id)->get();

        $response = '<option value="">Select Your Area</option>';

        if ($get_area) {
            foreach ($get_area as $value) {
                $response .= '<option value="'.$value->id.'">'.$value->area_name.'</option>';
            }
        }else{
            $response .= '<option value="">No data found</option>';
        }
    return $response;
    }

    public function user_order()
    {
        $user_id    = Auth::user()->id;
        $order_list = OrderMaster::where('customer_id',$user_id)->get();

        return view('front-end.dashboard.user_order')->withOrder($order_list);
    }

    public function OrderView($id)
    {
        $order_info = OrderMaster::where('id',$id)->first();
        $order_view = OrderDetails::where('order_master_no',$id)->get();

        return view('front-end.dashboard.order_view')->withInfo($order_info)->withView($order_view);
    }

    public function Password()
    {
        return view('front-end.dashboard.user_password');
    }

    public function CheckoutReturn($id)
    {
        $order = OrderMaster::where('id',$id)->first();
        $order_info = OrderDetails::where('order_master_no',$id)->get();

        return view('front-end.dashboard.checkout_return')->withOrder($order)->withInfo($order_info);
    }
}
