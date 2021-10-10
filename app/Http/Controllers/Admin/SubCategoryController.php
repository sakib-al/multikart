<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{

    public function __construct(Category $category,  Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->category = $category;

    }

    public function index()
    {
        $category   =  $this->category->getCategoryCombo();
        $subcategory  =  SubCategory::all();

        return view('back-end.subcategory.index')->withSubcategory($subcategory)->withCategory($category);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            $subcategory                  =  new SubCategory;
            $subcategory->name            =  $request->name;
            $subcategory->categories_id   =  $request->category;
            $subcategory->status          = $request->status;

            if ($request->file('subcategory_image')) {

                $file_name = 'subcategory' . date('dmY') . '_' . uniqid() . '.' . $request->file('subcategory_image')->getClientOriginalExtension();
                $subcategory->images = $file_name;
                $request->file('subcategory_image')->move(public_path() . '/images/subcategory', $file_name);
            }
             $subcategory->save();
        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Subcategory Create Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $subcategory  = SubCategory::find($id);
            $subcategory->name  = $request->name;
            $subcategory->status = $request->status;
            $subcategory->categories_id = $request->category;

            if ($request->file('subcategory_image')) {

                $image  = public_path(). '/images/subcategory/'. $subcategory->image;
                $file_name = 'subcategory' . date('dmY') . '_' . uniqid() . '.' . $request->file('subcategory_image')->getClientOriginalExtension();
                $subcategory->image = $file_name;
                $request->file('subcategory_image')->move(public_path() . '/images/subcategory', $file_name);
                if(file_exists($image))
                {
                    unlink($image);
                }
            }
            $subcategory->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::info('Subcategory Update Succesfully', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('subcategory.index');
    }

    public function delete($id)
    {
        $subcategory = SubCategory::find($id);
        $image  = public_path(). '/images/subcategory/'. $subcategory->images;

        if(file_exists($image))
        {
            unlink($image);
            $subcategory->delete();

            Toastr::error('Subcategory Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('subcategory.index');
        }
        else{

            $subcategory->delete();
            Toastr::error('Subcategory Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('subcategory.index');
        }
    }

    public function getSubcategory($id)
    {
        $get_subcategory  = SubCategory::select('id','name')->where('categories_id',$id)->get();

        $response = '<option value="">Select Subcategory</option>';

        if ($get_subcategory) {
            foreach ($get_subcategory as $value) {
                $response .= '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
        }else{
            $response .= '<option value="">No data found</option>';
        }
    return $response;
    }
}
