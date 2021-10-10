<?php

namespace App\Http\Controllers\Admin;

use App\Model\Area;
use App\Model\City;
use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function __construct(Country $country, City $city,  Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->city = $city;
        $this->country = $country;
    }

    public function index()
    {
        $country = $this->country->getCountryCombo();
        $city    = $this->city->getCityCombo();
        $area    = Area::where('status',1)->get();

        return view('back-end.area.index')->withCountry($country)->withCity($city)->withArea($area);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try{
            $get_country         = Country::where('id',$request->country_id)->first();
            $get_city            = City::where('id',$request->city_id)->first();
            $duplicate_check     = Area::where('area_name',$request->area_name)->where('city_id',$request->city_id)->count();
            $area                = new Area;
            $area->country_id    = $request->country_id;
            $area->city_id       = $request->city_id;
            if ($duplicate_check > 0) {
                Toastr::error('This Area Already Added', 'Duplicate Entry!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('area.index');
            }else{
                $area->area_name     = $request->area_name;
            }
            $area->country_name  = $get_country->name;
            $area->city_name     = $get_city->city_name;
            $area->status        = $request->status;
            $area->edited_by     = Auth::user()->name;
            $area->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Area Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('area.index');
    }

    public function update(Request $request,$id)
    {
        DB::beginTransaction();

        try{
            $get_country         = Country::where('id',$request->country_id)->first();
            $get_city            = City::where('id',$request->city_id)->first();
            $duplicate_check     = Area::where('area_name',$request->area_name)->where('city_id',$request->city_id)->count();
            $area                = Area::find($id);
            $area->country_id    = $request->country_id;
            $area->city_id       = $request->city_id;
            if ($duplicate_check > 0) {
                Toastr::error('This Area Already Added', 'Duplicate Entry!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('area.index');
            }else{
                $area->area_name     = $request->area_name;
            }
            $area->country_name  = $get_country->name;
            $area->city_name     = $get_city->city_name;
            $area->status        = $request->status;
            $area->edited_by     = Auth::user()->name;
            $area->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Area Update Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('area.index');

    }

    public function delete($id)
    {
        $area = Area::find($id);
        $area->delete();

        Toastr::error('Area Delete Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('area.index');
    }


}
