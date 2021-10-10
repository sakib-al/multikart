<?php

namespace App\Http\Controllers\Api;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public function getProduct()
    {
        $product  = Product::all();
        return response()->json($product);
    }
}
