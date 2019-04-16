<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticalProduct extends Model
{
    protected $fillable = [
        'optical_product_title',
        'b_optical_product_title',
        'optical_product_description',
        'b_optical_product_description',
        'optical_product_photo',
        'photo_path',
        'optical_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'optical_product';


    public function optical()
    {
        return $this->belongsTO('App\Models\Optical', 'optical_id');
    }

    public function productCategory()
    {
        return $this->belongsTO('App\Models\ProductCategory', 'product_category_id');
    }

    public function productSubcategory()
    {
        return $this->belongsTO('App\Models\ProductSubCategory', 'product_subcategory_id');
    }
}
