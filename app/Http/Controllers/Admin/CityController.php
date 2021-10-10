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

class CityController extends Controller
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
        $city    = City::all();

        return view('back-end.city.index')->withCountry($country)->withCity($city);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try{
            $get_country         = Country::where('id',$request->country_id)->first();
            $duplicate_check     = City::where('city_name',$request->city_name)->count();
            $city                = new City;
            $city->country_id    = $request->country_id;
            if ($duplicate_check > 0) {
                Toastr::error('This City Already Added', 'Duplicate Entry!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('city.index');
            }else{
                $city->city_name     = $request->city_name;
            }
            $city->country_name   = $get_country->name;
            $city->delivery_cost  = $request->delivery_cost;
            $city->status         = $request->status;
            $city->edited_by      = Auth::user()->name;
            $city->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('City Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('city.index');
    }

    public function update(Request $request,$id)
    {
        DB::beginTransaction();

        try{
            $get_country         = Country::where('id',$request->country_id)->first();
            $duplicate_check     = City::where('city_name',$request->city_name)->where('id', '!=', $id)->count();
            $city                = City::find($id);
            $city->country_id    = $request->country_id;
            if ($duplicate_check > 0) {
                Toastr::error('This City Already Added', 'Duplicate Entry!', ["positionClass" => "toast-top-right"]);
                return redirect()->route('city.index');
            }else{
                $city->city_name     = $request->city_name;
            }
            $city->city_name     = $request->city_name;
            $city->country_name  = $get_country->name;
            $city->delivery_cost = $request->delivery_cost;
            $city->status        = $request->status;
            $city->edited_by     = Auth::user()->name;
            $city->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('City Added Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('city.index');
    }

    public function delete($id)
    {
        $check_id = Area::where('city_id',$id)->count();
        $city = City::find($id);

        if ($check_id > 0) {
            Toastr::warning('Country Delete Not Allowed!!', 'Child Data Found!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('city.index');
        }else{

        $city->delete();
        Toastr::error('Country Delete Succesfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('city.index');
        }

    }
}
