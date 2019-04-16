<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyProduct extends Model
{
    protected $fillable = [
        'physiotherapy_product_title',
        'b_physiotherapy_product_title',
        'physiotherapy_product_description',
        'b_physiotherapy_product_description',
        'physiotherapy_product_photo',
        'photo_path',
        'physiotherapy_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'physiotherapy_product';


    public function physiotherapy()
    {
        return $this->belongsTO('App\Models\Physiotherapy', 'physiotherapy_id');
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
