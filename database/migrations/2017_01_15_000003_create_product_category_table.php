<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_category_name');
            $table->string('b_product_category_name');
            $table->timestamps();
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('product_category');
    }
}
