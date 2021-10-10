<?php

namespace App\Http\Controllers\Front;

use App\Model\Product;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function collection()
    {
        $collection = SubCategory::select('sub_categories.*','sub_categories.id as subcat_id',DB::raw('(select ifnull(count(id),0) from product where sub_categories = subcat_id) as qty'))->where('status',1)->orderBy('id','desc')->take(8)->get();

        return view('front-end.collection')->withCollection($collection);
    }

    

    public function collection_view($slug)
    {
        $side_subcat = SubCategory::where('status',1)->get();
        $sub_cat_id = SubCategory::Select('id')->where('url_slug',$slug)->first();
        $new_product  =  Product::where('status',1)->orderBy('created_at','desc')->take(6)->get();
        $collection_view  = Product::where('sub_categories',$sub_cat_id->id)
        ->select('sub_categories.*','sub_categories.name as sub_name','product.*','product.id as product_id')
        ->leftJoin('sub_categories','sub_categories.id','=','product.sub_categories')
        ->orderBy('product.id','desc')
        ->get();

        return view('front-end.collection_view')
        ->withNewproduct($new_product)
        ->withSidecategory($side_subcat)
        ->withCategoryview($collection_view);

    }
}
