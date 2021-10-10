<?php

namespace App\Http\Controllers\Api;

use App\Model\Slider;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexApiController extends Controller
{
    public function getIndex()
    {

        $data['slider'] = Slider::all();
        $data['category'] = Category::all();
        $data['new_product'] = Product::where('status',1)->orderBy('created_at', 'desc')->take(8)->get();
        $data['top_product'] = Product::where('is_feature',1)->where('status',1)->orderBy('id','desc')->take(5)->get();
        $data['best_product'] = Product::where('best_sell',1)->where('status',1)->orderBy('id','desc')->take(8)->get();
        $data['feature_product'] = Product::where('is_feature',1)->where('status',1)->orderBy('id','desc')->take(8)->get();

        return response()->json($data);
    }
}
