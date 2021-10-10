<?php

namespace App\Http\Controllers\Admin;

use App\Model\OrderCancel;
use App\Model\OrderMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrderCancelController extends Controller
{
    public function CancelIndex()
    {
        $order_cancel = OrderCancel::get();
        return view('back-end.order.order_cancel')->withCancel($order_cancel);
    }
}
