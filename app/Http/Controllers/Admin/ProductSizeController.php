<?php

namespace App\Http\Controllers\Admin;

use App\Model\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductSizeController extends Controller
{
    public function index(){

        $size = ProductSize::all();

        return view('back-end.size.index')->withSize($size);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();

        try {
            $size         =  new ProductSize;
            $size->name   =  $request->name;
            $size->code   =  $request->code;
            $size->status =  $request->status;
            $size->save();

        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Size Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('size.index');
    }

    public function update(Request $request, $id){

        DB::beginTransaction();

        try {
            $size         =  ProductSize::find($id);
            $size->name   =  $request->name;
            $size->code   =  $request->code;
            $size->status =  $request->status;
            $size->save();

        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Size Update Succesfully', 'Update', ["positionClass" => "toast-top-right"]);
        return redirect()->route('size.index');

    }

    public function delete($id)
    {
        $size = ProductSize::find($id);

        $size->delete();

        Toastr::error('Size Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return redirect()->route('size.index');
    }


}
