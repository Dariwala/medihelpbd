<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = array('product_category_name', 'b_product_category_name');

    protected $table = 'product_category';

    public function ProductSubcategories()
    {
    	return $this->hasMany('App\Models\ProductSubCategory','product_category_id');
    }
}
