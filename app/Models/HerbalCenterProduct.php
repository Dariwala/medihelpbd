<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterProduct extends Model
{
    protected $fillable = [
        'herbal_center_product_title',
        'b_herbal_center_product_title',
        'herbal_center_product_description',
        'b_herbal_center_product_description',
        'herbal_center_product_photo',
        'photo_path',
        'herbal_center_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'herbal_center_product';


    public function herbalCenter()
    {
        return $this->belongsTO('App\Models\herbalCenter', 'herbal_center_id');
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
