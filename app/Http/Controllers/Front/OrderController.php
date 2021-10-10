<?php

namespace App\Http\Controllers\Front;

use App\Model\OrderCancel;
use App\Model\OrderMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    public function CancelRequest(Request $request,$id)
    {
        DB::beginTransaction();

        try{

            $order                          = OrderMaster::find($id);
            $order->cancel_request          = 1;
            $order->save();

            $order_cancel                   = new OrderCancel;
            $order_cancel->order_master_no	= $order->id;
            $order_cancel->order_note	    = $request->order_note;
            $order_cancel->order_id	        = $order->order_id;
            $order_cancel->status	        = 0;
            $order_cancel->save();
        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }
        DB::commit();

        Toastr::info('Order Cancel Request Send!!', 'Order Cancel', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


}
