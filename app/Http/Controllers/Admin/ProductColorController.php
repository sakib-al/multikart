<?php

namespace App\Http\Controllers\Admin;

use App\Model\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductColorController extends Controller
{
    public function index()
    {
        $color  =  ProductColor::all();

        return view('back-end.color.index')->withColor($color);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();

        try {
            $color         =  new ProductColor;
            $color->name   =  $request->name;
            $color->color_code   =  $request->code;
            $color->status =  $request->status;
            $color->save();

        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Color Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('color.index');
    }

    public function update(Request $request, $id){

        DB::beginTransaction();

        try {
            $color         =  ProductColor::find($id);
            $color->name   =  $request->name;
            $color->color_code   =  $request->code;
            $color->status =  $request->status;
            $color->save();

        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Color Update Succesfully', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('color.index');

    }

    public function delete($id)
    {
        $color = ProductColor::find($id);

        $color->delete();

        Toastr::error('Color Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return redirect()->route('color.index');
    }
}
