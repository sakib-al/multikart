<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\Category;
use App\Model\ProductSize;
use App\Model\SubCategory;
use App\Model\ProductColor;
use App\Model\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct(Product $product, Category $category, SubCategory $subcategory, ProductColor $color, ProductSize $size,  Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->product = $product;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->color = $color;
        $this->size = $size;

    }

    public function index()
    {
        $product  = Product::all();
        return view('back-end.product.index')->withProduct($product);
    }

    public function create()
    {
        $category      =  $this->category->getCategoryCombo();
        $subcategory   =  $this->subcategory->getSubCategoryCombo();
        $color         =  $this->color->getColorCombo();
        $size          =  $this->size->getSizeCombo();
        return view('back-end.product.create')
        ->withCategory($category)
        ->withSubcategory($subcategory)
        ->withColor($color)
        ->withSize($size);
    }

    public function edit($id)
    {
        $product       = Product::find($id);
        $size          =  $this->size->getSizeCombo();
        $color         =  $this->color->getColorCombo();
        $category      =  $this->category->getCategoryCombo();
        $subcategory   =  $this->subcategory->getSubCategoryCombo();

        return view('back-end.product.edit')
        ->withProduct($product)
        ->withCategory($category)
        ->withSubcategory($subcategory)
        ->withColor($color)
        ->withSize($size);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();


        try {

            $slug = Str::slug(strtolower($request->title));
            $check = Product::where('url_slug',$slug)->first();
            if($check){
                $slug = $slug.'-'.rand(1,99);
            }

            $product                    = new Product;
            $product->name              = $request->title;
            $product->sku               = $request->sku;
            $product->categories        = $request->category;
            $product->sub_categories    = $request->subcategory;
            $product->color_id          = $request->prd_color;
            $product->size_id           = $request->prd_size;
            $product->summary           = $request->summary;
            $product->description       = $request->description;
            $product->price             = $request->price;
            if ($request->discount_status == 1) {
                $product->discount_status   = $request->discount_status;
                $product->discount_value    = $request->discount_price;
                $product->discount_start    = $request->discount_date_start;
                $product->discount_end      = $request->discount_date_end;
            }else{
                $product->discount_status   = null;
                $product->discount_value    = null;
                $product->discount_start    = null;
                $product->discount_end      = null;
            }

            $product->status            = $request->status;
            // $product->product_status    = isset($request->product_status) ? implode(",", $request->product_status) : '';
            $product->is_feature        = $request->feature_status;
            $product->best_sell         = $request->best_sell_status;
            $product->meta_title        = $request->meta_title;
            $product->meta_description  = $request->meta_description;
            $product->url_slug          = $slug;
            $product->save();

            if ($request->file('images')) {

                foreach ($request->file('images') as $key => $image) {
                    $file_name = 'prod_' . date('dmY') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $img_lib = new ProductImage();
                    $img_lib->product_id = $product->id;
                    $img_lib->name = $file_name;

                    $img_lib->relative_path = '/images/product/';
                    $img_lib->save();

                    $image->move(public_path() . '/images/product/', $file_name);
                }
            }

        } catch (\Exception $e) {

            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }
        DB::commit();

        Toastr::success('Product Create Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index');

    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $slug = Str::slug(strtolower($request->title));
            $check = Product::where('url_slug',$slug)->where('id','!=',$id)->first();
            if($check){
                $slug = $slug.'-'.rand(1,99);
            }

            $product                    = Product::find($id);
            $product->name              = $request->title;
            $product->sku               = $request->sku;
            $product->categories        = $request->category;
            $product->sub_categories    = $request->subcategory;
            $product->color_id          = $request->prd_color;
            $product->size_id           = $request->prd_size;
            $product->summary           = $request->summary;
            $product->description       = $request->description;
            $product->price             = $request->price;
            if ($request->discount_status == 1) {
                $product->discount_status   = $request->discount_status;
                $product->discount_value    = $request->discount_price;
                $product->discount_start    = $request->discount_date_start;
                $product->discount_end      = $request->discount_date_end;
            }else{
                $product->discount_status   = null;
                $product->discount_value    = null;
                $product->discount_start    = null;
                $product->discount_end      = null;
            }
            $product->status            = $request->status;
            // $product->product_status    = isset($request->product_status) ? implode(",", $request->product_status) : '';
            $product->is_feature        = $request->feature_status;
            $product->best_sell         = $request->best_sell_status;
            $product->meta_title        = $request->meta_title;
            $product->meta_description  = $request->meta_description;
            $product->url_slug          = $slug;
            $product->save();

            if ($request->file('images')) {

                $prd_img = ProductImage::select('name')->where('product_id',$id)->get();
                foreach ($prd_img as $key => $value) {

                    $image  = public_path(). '/images/product/'. $value->name;

                    if(file_exists($image))
                    {
                        unlink($image);
                    }
                }
                ProductImage::where('product_id',$id)->delete();

                foreach ($request->file('images') as $key => $images) {
                    $file_name = 'prod_' . date('dmY') . '_' . uniqid() . '.' . $images->getClientOriginalExtension();
                    $img_lib = new ProductImage();
                    $img_lib->product_id = $product->id;
                    $img_lib->name = $file_name;

                    $img_lib->relative_path = '/images/product/';
                    $img_lib->save();

                    $images->move(public_path() . '/images/product/', $file_name);
                }

            }

        } catch (\Exception $e) {

            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }


        DB::commit();

        Toastr::success('Product Update Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index');

    }


    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $product  = Product::find($id);
            $product->delete();
            $prd_img = ProductImage::select('name')->where('product_id',$id)->get();

            foreach ($prd_img as $key => $value) {

                $image  = public_path(). '/images/product/'. $value->name;

                if(file_exists($image))
                {
                    unlink($image);
                }
            }
            ProductImage::where('product_id',$id)->delete();
        } catch (\Exception $e) {

            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }
        DB::commit();

        Toastr::error('Product Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index');
    }

    public function getImageDel($id)
    {
        $image_id = ProductImage::select('name')->where('id',$id)->get();

        foreach ($image_id as $key => $value) {
            $image = public_path(). '/images/product/'. $value->name;
            if(file_exists($image))
            {
                unlink($image);
            }
        }

        $data = ProductImage::where('id', $id)->delete();
        if ($data) {
            return ['status' => 'true'];
        } else {
            return false;
        }

    }
}
