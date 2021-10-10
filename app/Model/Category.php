<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function subcategories_item()
    {
        return $this->hasMany('App\Model\SubCategory', 'categories_id', 'id');
    }

    
    public function getCategoryCombo(){

        $data = Category::get();
        $response = [];
        if ($data) {
            foreach ($data as $key => $value) {
                $response[$value->id] = $value->name;
            }
        }
        return $response;
    }
}
