<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function singleImage(){

        return $this->hasOne('App\Model\ProductImage', 'product_id', 'id');
    }

    public function multipleImage(){
        return $this->hasMany('App\Model\ProductImage','product_id','id');
    }

    public function singleImageBack(){

        return $this->hasOne('App\Model\ProductImage', 'product_id', 'id')->orderBy('id','DESC');
    }

    public function categories_item()
    {
        return $this->hasOne('App\Model\Category', 'id', 'categories');
    }

    public function subcategories_item()
    {
        return $this->hasOne('App\Model\SubCategory', 'id', 'sub_categories');
    }

    public function color_item()
    {
        return $this->hasOne('App\Model\ProductColor', 'id', 'color_id');
    }

    public function size_item()
    {
        return $this->hasOne('App\Model\ProductSize', 'id', 'size_id');
    }

    public function allDefaultPhotos() {
        return $this->hasMany('App\Model\ProductImage', 'product_id','id');
    }
}
