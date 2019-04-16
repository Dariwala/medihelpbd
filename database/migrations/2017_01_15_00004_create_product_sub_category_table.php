<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('product_subcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_subcategory_name');
            $table->string('b_product_subcategory_name');
            $table->Integer('product_category_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('product_subcategory');
    }
}
