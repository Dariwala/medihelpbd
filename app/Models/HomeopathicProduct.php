<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeopathicProduct extends Model
{
    protected $fillable = [
        'homeopathic_product_title',
        'b_homeopathic_product_title',
        'homeopathic_product_description',
        'b_homeopathic_product_description',
        'homeopathic_product_photo',
        'photo_path',
        'homeopathic_id',
        'product_category_id',
        'product_subcategory_id',
    ];

    protected $table = 'homeopathic_product';


    public function homeopathic()
    {
        return $this->belongsTO('App\Models\Homeopathic', 'homeopathic_id');
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
