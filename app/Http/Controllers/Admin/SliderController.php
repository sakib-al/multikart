<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function slide_index()
    {
        $slider  = Slider::all();

        return view('back-end.media.home-slider.index')->withSlide($slider);
    }

    public function slide_create()
    {
        return view('back-end.media.home-slider.create');
    }

    public function slide_edit($id)
    {
        $slider   = Slider::find($id);

        return view('back-end.media.home-slider.edit')->withSlide($slider);
    }


    public function slide_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $slide                  =  new Slider;
            $slide->name            =  $request->slide_name;
            $slide->slide_title     =  $request->slide_title;
            $slide->slide_subtitle  =  $request->slide_subtitle;
            $slide->status          = $request->status;

            if ($request->file('images')) {

                $file_name = 'slider' . date('dmY') . '_' . uniqid() . '.' . $request->file('images')[0]->getClientOriginalExtension();
                $slide->slide_image = $file_name;
                $request->file('images')[0]->move(public_path() . '/images/slider', $file_name);
            }
             $slide->save();
        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Slider Image Create Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('slider.index');
    }


    public function slide_update(Request $request,$id)
    {
        DB::beginTransaction();

        try {
            $slide                  =  Slider::find($id);
            $slide->name            =  $request->slide_name;
            $slide->slide_title     =  $request->slide_title;
            $slide->slide_subtitle  =  $request->slide_subtitle;
            $slide->status          = $request->status;

            if ($request->file('images')) {

                $image  = public_path(). '/images/slider/'. $slide->slide_image;
                if(file_exists($image))
                {
                    unlink($image);
                }
                $file_name = 'slider' . date('dmY') . '_' . uniqid() . '.' . $request->file('images')[0]->getClientOriginalExtension();
                $slide->slide_image = $file_name;
                $request->file('images')[0]->move(public_path() . '/images/slider', $file_name);
            }
             $slide->save();
        } catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();

        Toastr::success('Slider Image Create Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return redirect()->route('slider.index');
    }


    public function slide_delete($id)
    {
        $slide = Slider::find($id);
        $image  = public_path(). '/images/slider/'. $slide->slide_image;

        if(file_exists($image))
        {
            unlink($image);
            $slide->delete();
            Toastr::error('Slider Image Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('slider.index');
        }
        else{

            $slide->delete();
            return redirect()->route('slider.index');
        }
    }
}
