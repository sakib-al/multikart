<?php

namespace App\Http\Controllers\Front;

use App\Model\Slider;
use App\Model\Product;
use App\Model\Category;
use App\Model\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $slider  = Slider::all();
        $category = Category::all();
        // $top_product = Product::whereNotNull('product_status')->orderBy('id', 'desc')->take(5)->get();
        $new_product = Product::where('status',1)->orderBy('created_at', 'desc')->take(8)->get();
        $top_product = Product::where('is_feature',1)->where('status',1)->orderBy('id','desc')->take(5)->get();
        $best_product = Product::where('best_sell',1)->where('status',1)->orderBy('id','desc')->take(8)->get();
        $feature_product = Product::where('is_feature',1)->where('status',1)->orderBy('id','desc')->take(8)->get();

        return view('welcome')
        ->withSlide($slider)
        ->withCategory($category)
        ->withBestsell($best_product)
        ->withTopproduct($top_product)
        ->withNewproduct($new_product)
        ->withFeatureproduct($feature_product);
    }

    public function product_view_modal($slug)
    {
        $view_product   = Product::leftjoin('product_images','product_images.product_id','product.id')->select('product.*','product_images.name as img')->where('product.id',$slug)->first();

        return response()->json($view_product);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $search_item    = Product::where('name', 'like', '%' .$search. '%')->get();

        return view('front-end.search')->withSearch($search_item);

    }

    public function contact()
    {
        $contact  = ContactUs::where('status',1)->first();

        return view('front-end.contact')->withContact($contact);
    }

    public function wishlist()
    {
        return view('front-end.wishlist');
    }

    



}
