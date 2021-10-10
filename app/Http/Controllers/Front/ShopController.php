<?php

namespace App\Http\Controllers\Front;

use App\Model\Product;
use App\Model\ProductSize;
use App\Model\SubCategory;
use App\Model\ProductColor;
use App\Model\ProductReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $subcat              = $request->subcat;
        $prd_size            = $request->prd_size;
        $subcat_filter       = SubCategory::where('status',1)->get();
        $product             =  Product::where('status',1)->orderBy('created_at','desc');
        $size                = ProductSize::where('status',1)->get();
        $color               = ProductColor::where('status',1)->get();

        if(!empty($subcat) && count($subcat) > 0){
            $product = $product->whereIn('sub_categories', $subcat);
        }
        if (!empty($prd_size) && count($prd_size) > 0) {
            $product = $product->where('size_id', $prd_size);
        }
        $product = $product->get();
        $new_product  =  Product::where('status',1)->orderBy('created_at','desc')->take(6)->get();

        return view('front-end.shop')
        ->withProduct($product)
        ->withNewproduct($new_product)
        ->withSubcatfilter($subcat_filter)
        ->withSize($size)
        ->withColor($color);
    }

    public function shop_view($slug)
    {


        $product_slug = Product::Select('id','view_count')->where('url_slug',$slug)->first();
        $new_product  =  Product::where('status',1)->orderBy('created_at','desc')->take(6)->get();
        $shop_view = Product::find($product_slug->id);
        $releated_product = Product::where('sub_categories',$shop_view->sub_categories)->take(6)->get();
        $review_product = ProductReview::select('product_review.*','product_review.created_at', 'users.name', 'users.user_image')->join('users', 'users.id', 'product_review.user_id')->where('product_review.product_id',$shop_view->id)->get();

        $productKey = 'product_' . $product_slug->id;

        if (!Session::has($productKey)) {
            $product_slug->increment('view_count');
            Session::put($productKey,1);
        }

        return view('front-end.product-view')
        ->withNewproduct($new_product)
        ->withShopview($shop_view)
        ->withReleatedproduct($releated_product)
        ->withReview($review_product);
    }
}
