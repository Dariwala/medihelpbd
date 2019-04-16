<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignmedicalProduct extends Model
{
    protected $fillable = [
        'foreignmedical_product_title',
        'b_foreignmedical_product_title',
        'foreignmedical_product_description',
        'b_foreignmedical_product_description',
        'foreignmedical_product_photo',
        'photo_path',
        'foreignmedical_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'foreignmedical_product';


    public function foreignmedical()
    {
        return $this->belongsTO('App\Models\Foreignmedical', 'foreignmedical_id');
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
