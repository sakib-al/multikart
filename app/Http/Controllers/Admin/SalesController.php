<?php

namespace App\Http\Controllers\Admin;

use App\Model\OrderCancel;
use App\Model\OrderMaster;
use App\Model\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SalesController extends Controller
{
    public function index()
    {
        $order = OrderMaster::with('OrderImage')->orderBy('created_at', 'DESC')->get();

        return view('back-end.order.order')->withOrder($order);
    }

    public function OrderView($id)
    {
        $order = OrderMaster::find($id);
        $order_info = OrderDetails::where('order_master_no',$id)->get();
        $cancel_req = OrderCancel::where('order_master_no',$id)->first();

        return view('back-end.order.order-view')
        ->withOrder($order)
        ->withInfo($order_info)
        ->withCancel($cancel_req);
    }

    public function OrderCancel($id)
    {
        $order = OrderMaster::find($id);
        $order->is_cancel = 1;
        $order->cancel_request = 0;
        $order->save();

        $update_cancel = OrderCancel::where('order_master_no',$id)->first();
        $update_cancel->delete();

        Toastr::error('Order Cancel Succesfully', 'Order Cancel!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function OrderConfirm($id)
    {
        $order = OrderMaster::find($id);
        $order->is_active = 1;
        $order->save();

        Toastr::success('Order Confirm Succesfully', 'Order Confirm!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('order.index');
    }

    public function getTransection()
    {
        $transection = OrderMaster::where('is_paid',2)->get();
        return view('back-end.order.transection')->withTransection($transection);
    }
}
