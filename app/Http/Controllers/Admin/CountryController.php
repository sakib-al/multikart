<?php

namespace App\Http\Controllers\Admin;

use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::all();
        return view('back-end.country.index')->withCountry($country);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try{
            $country = new Country;
            $country->name   = $request->name;
            $country->status = $request->status;
            $country->edited_by = Auth::user()->name;
            $country->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Country Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('country.index');

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $country = Country::find($id);
            $country->name   = $request->name;
            $country->status = $request->status;
            $country->edited_by = Auth::user()->name;
            $country->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Country Update Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('country.index');
    }

    public function delete($id)
    {
        $country = Country::find($id);
        $country->delete();

        Toastr::error('Country Delete Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('country.index');
    }
}
