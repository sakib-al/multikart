<?php

namespace App\Http\Controllers\Front;

use App\Model\Area;
use App\Model\City;
use App\Traits\MAIL;
use App\Model\Country;
use App\Model\Product;
use App\Model\WebCart;
use App\Model\OrderMaster;
use App\Model\UserAddress;
use App\Model\OrderDetails;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    use MAIL;
    public function __construct(Country $country, City $city, Area $area)
    {
        $this->city = $city;
        $this->area = $area;
        $this->country = $country;
    }

    public function cart()
    {
        return view('front-end.cart');
    }

    public function cartStore(Request $request)
    {
        DB::beginTransaction();

        try{

            $prod_id  = $request->input('product_id');
            $quantity = $request->input('quantity');

            if (Cookie::get('shopping_cart')) {

                $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
                $cart_data = \json_decode($cookie_data, true);
            }else{

                $cart_data = array();
            }

            $item_id_list = \array_column($cart_data,'item_id');
            $if_prod_id = $prod_id;

            if (\in_array($if_prod_id, $item_id_list)) {

                foreach ($cart_data as $keys => $value) {

                    if ($cart_data[$keys]["item_id"] == $prod_id) {

                        $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                        $item_data = \json_encode($cart_data);
                        $item_dats =\json_decode($item_data);
                        $minutes = 1440;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                        return response()->json(['status' => '"'.$cart_data[$keys]["item_name"]." Already Added to Cart!!!",'return'=>0]);

                    }
                }
            }else {

                $products = Product::find($prod_id);
                $product_img = ProductImage::where('product_id',$prod_id)->first();

                $prod_name       = $products->name;
                $prod_price      = $products->price;
                $discount_status = $products->discount_status ?? 0;
                $discount_value  = $products->discount_value ?? 0;
                $prod_img        = $product_img->name;
                $discount_end    = $products->discount_end;

                if ($products) {
                    $item_array = array(
                        'item_id'             => $prod_id,
                        'item_name'           => $prod_name,
                        'item_price'          => $prod_price,
                        'item_discount'       => $discount_status,
                        'item_discount_value' => $discount_value,
                        'item_discount_end'   => $discount_end,
                        'item_img'            => $prod_img,
                        'item_quantity'       => $quantity

                    );
                    $cart_data[] = $item_array;
                    $added_item = $item_array;
                    $item_data = \json_encode($cart_data);
                    $minutes = 1440;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    if (Cookie::get('shopping_cart')) {
                        $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
                        $cart_data = \json_decode($cookie_data, true);
                        $cart_count = count($cart_data);
                        $cart_count++;
                    }else{
                        $cart_count = 0;
                    }

                    return response()->json(['return'=>1,'data'=>$added_item,'status'=>'Add to cart Successfully','cart_count'=>$cart_count]);
                }
            }

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }
    }

    public function cartUpdate(Request $request)
    {
        $prod_id  = $request->product_id;
        $prod_qty = $request->quantity;

        if (Cookie::get('shopping_cart')) {

            $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
            $cart_data = \json_decode($cookie_data, true);
        }else{

            $cart_data = array();
        }

        $item_id_list = \array_column($cart_data,'item_id');
        $if_prod_id = $prod_id;

        if (\in_array($if_prod_id, $item_id_list)) {
            foreach ($cart_data as $keys => $value) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {

                    $cart_data[$keys]["item_quantity"] = $prod_qty;
                    $item_data = \json_encode($cart_data);
                    $item_dats =\json_decode($item_data);
                    $minutes = 1440;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                    return response()->json(['status' => '"'.$cart_data[$keys]["item_name"]." Update Cart Successfully",'return'=>1]);
                }
            }
        }

    }

    public function cartDelete(Request $request)
    {

        $prod_id            = $request->input('product_id');
        $cookie_data        = stripslashes(Cookie::get('shopping_cart'));
        $cart_data          = json_decode($cookie_data, true);
        $item_id_list       = array_column($cart_data, 'item_id');
        $prod_id_is_there   = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 1440;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    if (Cookie::get('shopping_cart')) {
                        $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
                        $cart_data = \json_decode($cookie_data, true);
                        $cart_count = count($cart_data);
                        $cart_count--;
                    }else{

                    }
                    return response()->json(['status'=>'Item Removed from Cart','cart_count'=>$cart_count]);
                }
            }
        }
    }


    public function checkout()
    {
        $shipping_area = [];
        $user    = Auth::user()->id;
        $city    = $this->city->getCityCombo();
        $country = $this->country->getCountryCombo();
        $shipping_address = UserAddress::where('user_id',$user)->where('shipping_address',1)->first();

        if (!empty($shipping_address->city_id)) {
            $del_cost = $this->city->where('id',$shipping_address->city_id)->first();
        }else{
            $del_cost = 0;
        }

        if (isset($shipping_address->city_id) && ($shipping_address->city_id) > 0) {
            $area = Area::where('city_id',$shipping_address->city_id)->get();
            foreach ($area as $key => $value) {
                $shipping_area[$value->id] = $value->area_name;
            }
        }

        return view('front-end.checkout')
        ->withCity($city)
        ->withCountry($country)
        ->withAddress($shipping_address)
        ->withShippingarea($shipping_area)
        ->withDelcost($del_cost);
    }

    public function OrderPlace(Request $request)
    {
        $is_verified = Auth::user()->is_verified;

        if (Cookie::get('shopping_cart')) {

        $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
        $cart_data = \json_decode($cookie_data, true);
        }else{

        $cart_data = array();
        }

        if ($is_verified == 1) {

            if ($cart_data > 0) {
                $order_sum = 0;
                $order_id  = rand(10,10000);
                $customer_id = Auth::user()->id;
                $get_address = UserAddress::where('user_id',$customer_id)->where('shipping_address',1)->first();
                $del_cost = $this->city->where('id',$get_address->city_id)->first();


                DB::beginTransaction();

                try{

                $order_master = new OrderMaster;
                $order_master->order_id         = $order_id;
                $order_master->customer_id      = $customer_id;
                $order_master->customer_name    = $get_address->first_name." ".$get_address->last_name ;
                $order_master->customer_mobile  = $get_address->phone_no;
                $order_master->from_country     = $get_address->country;
                $order_master->from_city        = $get_address->city;
                $order_master->from_area        = $get_address->area;
                $order_master->from_postcode    = $get_address->post_code;
                $order_master->customer_address = $get_address->address;
                $order_master->order_sum        = $order_sum;
                $order_master->delivery_cost    = $del_cost->delivery_cost;
                $order_master->is_cancel        = 0;

                if ($request->payment_type == 1) {
                    $order_master->is_cod       = $request->payment_type;
                }

                if ($request->payment_type == 2) {
                    $order_master->is_paid      = $request->payment_type;
                }

                if ($request->payment_type == 2) {

                    if (empty($request->transection_id)) {

                        Toastr::error('Please Type your bKash Transection Number', 'Empty Transection Number!!', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('checkout');
                    }else{
                        $order_master->transection_id   = $request->transection_id;
                    }
                }

                $order_master->save();

                foreach ($cart_data as $key => $value) {
                    $prd_id          = $value["item_id"];
                    $prd_qty         = $value["item_quantity"];
                    $prd_image       = $value["item_img"];
                    $discount_status = $value["item_discount"];
                    $discount_value  = $value["item_discount_value"];
                    $discount_end    = $value["item_discount_end"];

                    if (date("Y-m-d") <= $discount_end ) {
                        if ($discount_status == 1) {
                            $d_price = ($value["item_price"] * $discount_value) / 100;
                            $price =  $value["item_price"] - $d_price;
                        }
                    }else{
                        $price = $value["item_price"];
                    }


                    $get_product         = Product::where('id',$prd_id)->first();
                    $prd_name            = $get_product->name;
                    $prd_regular_price   = $price;
                    $prd_sub_total       = $price * $prd_qty;
                    $order_sum          += $prd_sub_total;

                    $order_details                      = new OrderDetails;
                    $order_details->order_master_no     = $order_master->id;
                    $order_details->product_id          = $prd_id;
                    $order_details->product_qty         = $prd_qty;
                    $order_details->product_name        = $prd_name;
                    $order_details->product_image       = $prd_image;
                    $order_details->regular_price       = $prd_regular_price;
                    if (date("Y-m-d") <= $get_product->discount_end) {
                        if ($get_product->discount_value   != null) {
                            $order_details->discount_price  = $get_product->discount_value;
                        }
                    }
                    $order_details->product_subtotal    = $prd_sub_total;
                    $order_details->status              = 0;
                    $order_details->save();
                }

                $update_order = OrderMaster::where('id',$order_details->order_master_no)->first();
                $update_order->order_sum = $order_sum + $del_cost->delivery_cost;
                $update_order->product_subtotal = $order_sum;
                $update_order->save();

                }catch (\Exception $e) {
                    DB::rollback();
                    echo '<pre>';
                    echo '======================<br>';
                    print_r($e->getMessage());
                    echo '<br>======================';
                    exit();
                }

                DB::commit();
                $remove_cookie = Cookie::queue(Cookie::forget('shopping_cart'));

                // Order Place Mail
                $user  = Auth::user();
                $order = OrderMaster::where('id',$order_master->id)->first();
                $order_info = OrderDetails::where('order_master_no',$order_master->id)->get();

                $mail_body = view('mail.order_place_mail')
                    ->with('order', $order)
                    ->with('order_info', $order_info)
                    ->with('user',$user)
                    ->render();

                $mail_response = $this->OrderPlaceEmail($mail_body,$user);
                if ($mail_response == 0) {
                    Toastr::error('Something went wrong!', 'Conact Support', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
                Toastr::success('Order Place Succesfully', 'Order Placed!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('checkout.return',$order_master->id);

            }
        }else{
            return view('auth.register_verify')->withUser(Auth::user());
        }


    }

}
