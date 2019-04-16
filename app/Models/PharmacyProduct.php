<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyProduct extends Model
{
    protected $fillable = [
        'pharmacy_product_title',
        'b_pharmacy_product_title',
        'pharmacy_product_description',
        'b_pharmacy_product_description',
        'pharmacy_product_photo',
        'photo_path',
        'pharmacy_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'pharmacy_product';


    public function pharmacy()
    {
        return $this->belongsTO('App\Models\Pharmacy', 'pharmacy_id');
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
