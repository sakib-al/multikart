<?php
use App\Model\Category;
use Illuminate\Support\Facades\Cookie;

//  ====== NAV Category =====  //

if (!function_exists('getNavCategory')) {
    function getNavCategory() {
        $data = Category::all();
       return $data;
    }
}


//  ====== Cart Data =====  //

// if (!function_exists('getCartData')) {
//     function getCartData(){
//     if (Cookie::get('shopping_cart')) {

//         $cookie_data = \stripslashes(Cookie::get('shopping_cart'));
//         $cart_data = \json_decode($cookie_data, true);
//     }else{

//         $cart_data = array();
//     }

//     $item_id_list = \array_column($cart_data,'item_id');
//     foreach ($cart_data as $keys => $value) {

//         $item_data = \json_encode($cart_data);
//         $item_dats =\json_decode($item_data);
//         $minutes = 60;
//         Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

//     }
//     return response()->json(['status' => '"'.$cart_data[$keys]["item_name"]." Already Added to Cart"]);
// }
// }
