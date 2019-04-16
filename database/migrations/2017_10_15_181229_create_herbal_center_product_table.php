<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterProductTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('herbal_center_product_title')->nullable();
            $table->string('b_herbal_center_product_title')->nullable();
            $table->longText('herbal_center_product_description')->nullable();
            $table->longText('b_herbal_center_product_description')->nullable();
            $table->string('herbal_center_product_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->Integer('herbal_center_id')->unsigned();
            $table->Integer('product_category_id')->unsigned();
            $table->Integer('product_subcategory_id')->unsigned();
            $table->timestamps();
            $table->foreign('herbal_center_id')->references('id')->on('herbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_subcategory_id')->references('id')->on('product_subcategory')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_product');
    }
}
