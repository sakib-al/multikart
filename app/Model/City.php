<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city_list';

    public function getCityCombo(){

        $data = City::where('status',1)->get();
        $response = [];
        if ($data) {
            $response[0] = 'Select City';
            foreach ($data as $key => $value) {
                $response[$value->id] = $value->city_name;
            }
        }
        return $response;
    }
}
