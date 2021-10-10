<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CustomersController extends Controller
{
    public function getCustomers()
    {
        $customers = User::where('user_type',0)->get();
        return view('back-end.customers.customers')->withCustomers($customers);
    }

    public function ViewCustomers($id)
    {
        $customers = User::find($id);
        echo '<pre>';
        echo '======================<br>';
        print_r($customers);
        echo '<br>======================<br>';
        exit();
    }

}
