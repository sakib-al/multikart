<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public function categories_item()
    {
        return $this->hasOne('App\Model\Category', 'id', 'categories_id');
    }

    public function getSubCategoryCombo(){

        $data = SubCategory::get();
        $response = [];
        if ($data) {
            foreach ($data as $key => $value) {
                $response[$value->id] = $value->name;
            }
        }
        return $response;
    }
}
