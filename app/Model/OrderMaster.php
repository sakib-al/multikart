<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    protected $table = 'order_master';

    public function OrderImage(){
        return $this->hasMany('App\Model\OrderDetails','order_master_no','id');
    }

}
