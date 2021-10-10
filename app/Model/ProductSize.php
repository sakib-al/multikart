<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_size';

    public function getSizeCombo(){

        $data = ProductSize::get();
        $response = [];
        if ($data) {
            foreach ($data as $key => $value) {
                $response[$value->id] = $value->name;
            }
        }
        return $response;
    }
}
