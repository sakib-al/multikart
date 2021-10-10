<?php

namespace App\Http\Controllers\Admin;

use App\Model\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;


class MediaController extends Controller
{
    public function index()
    {
        $media  = Media::all();
        return view('back-end.media.index')->withMedia($media);
    }

    public function create(Request $request)
    {

        DB::beginTransaction();

        try{
            $gallery            = new Media();
            $gallery->name      = $request->name;

            if ($request->file('gallery_image')) {

                       $file_name = 'gallery' . date('dmY') . '_' . uniqid() . '.' . $request->file('gallery_image')->getClientOriginalExtension();
                       $gallery->images = $file_name;
                       $request->file('gallery_image')->move(public_path() . '/images/gallery', $file_name);
            }
            $gallery->save();

        } catch (\Exception $e){
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }
        DB::commit();

        Toastr::success('Image Added Succesfully', 'Create', ["positionClass" => "toast-top-right"]);
        return view('back-end.media.index');
    }

    public function delete($id)
    {
        $gallery = Media::find($id);
        $image  = public_path(). '/images/gallery/'. $gallery->images;

        if(file_exists($image))
        {
            unlink($image);
            $gallery->delete();
            Toastr::error('Image Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('media.index');
        }
        else{

            $gallery->delete();
            Toastr::error('Image Delete Succesfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return redirect()->route('media.index');
        }
    }

    // Slider

    
}
