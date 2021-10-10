<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Product;
use App\Model\OrderMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function __construct(OrderMaster $order, Auth $auth, Product $product)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->order = $order;
        $this->product = $product;

    }

    public function index()
    {
        $order_list = OrderMaster::orderBy('created_at', 'DESC')->take(5)->get();
        $total_order = $this->order->whereMonth('created_at', date('m'))->count();
        $total_transec = $this->order->where('is_active',1)->whereMonth('created_at', date('m'))->sum('order_sum');
        $total_prd = $this->product->where('status',1)->count();
        $total_customer = User::where('user_type',0)->count();

        return view('back-end.dashboard.dashboard')
        ->withOrder($order_list)
        ->withOrdersum($total_transec)
        ->withTotalorder($total_order)
        ->withTotalprd($total_prd)
        ->withTotalcustomer($total_customer);
    }

    public function clear()
    {
        // Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:cache');
        Artisan::call('view:clear');
        return 'OK';
    }

    public function test()
    {

        return view('auth.register_verify');
    }
}
