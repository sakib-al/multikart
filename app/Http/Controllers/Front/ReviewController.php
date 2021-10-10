<?php

namespace App\Http\Controllers\Front;

use App\Model\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review_store(Request $request){

        $user_id  = Auth::user()->id;

        DB::beginTransaction();
        try{
            $review                 = new ProductReview;
            if (Auth::user()!==null) {
                $review->user_id        = Auth::user()->id;
            }else {
                return redirect()->route('login');
            }

            $review_check = ProductReview::where('user_id',$user_id)->where('product_id',$request->product_id)->count();
            $review->product_id     = $request->product_id;
            $review->review_title   = $request->review_title;
            $review->review_details	= $request->review_description;

            if ($review_check == 0) {
                $review->save();
            }else{
                Toastr::error('You already review this product!!', 'Error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        }catch(\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();
        return redirect()->back();

    }
}
