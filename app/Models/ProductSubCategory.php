<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $fillable = array('product_subcategory_name', 'b_product_subcategory_name', 'product_category_id');

    protected $table = 'product_subcategory';

    public function productCategory()
    {
    	return $this->belongsTo('App\Models\ProductCategory');
    }
}
