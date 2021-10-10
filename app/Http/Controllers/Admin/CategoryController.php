<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category  =  Category::all();

        return view('back-end.category.index')->withCategory($category);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            $category         =  new Category;
            $category->name   =  $request->name;
            $category->status = $request->status;

            if ($request->file('category_image')) {

                $file_name = 'category' . date('dmY') . '_' . uniqid() . '.' . $request->file('category_image')->getClientOriginalExtension();
                $category->image = $file_name;
                $request->file('category_image')->move(public_path() . '/images/category', $file_name);
            }
             $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Category Added Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index');

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $category  = Category::find($id);
            $category->name  = $request->name;
            $category->status = $request->status;

            if ($request->file('category_image')) {

                $image  = public_path(). '/images/category/'. $category->image;
                $file_name = 'category' . date('dmY') . '_' . uniqid() . '.' . $request->file('category_image')->getClientOriginalExtension();
                $category->image = $file_name;
                $request->file('category_image')->move(public_path() . '/images/category', $file_name);
                if(file_exists($image))
                {
                    unlink($image);
                }
            }
            $category->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::info('Category Update Succesfully', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $image  = public_path(). '/images/category/'. $category->image;

        if(file_exists($image))
        {
            unlink($image);
            $category->delete();
            Toastr::error('Category Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('category.index');
        }
        else{

            $category->delete();
            return redirect()->route('category.index');
        }
    }
}
