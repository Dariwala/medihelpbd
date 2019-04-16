<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacynewProduct extends Model
{
    protected $fillable = [
        'pharmacynew_product_title',
        'b_pharmacynew_product_title',
        'pharmacynew_product_description',
        'b_pharmacynew_product_description',
        'pharmacynew_product_photo',
        'photo_path',
        'pharmacynew_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'pharmacynew_product';


    public function pharmacynew()
    {
        return $this->belongsTO('App\Models\Pharmacynew', 'pharmacynew_id');
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
