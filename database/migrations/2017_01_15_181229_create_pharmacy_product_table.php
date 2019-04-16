<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyProductTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pharmacy_product_title')->nullable();
            $table->string('b_pharmacy_product_title')->nullable();
            $table->longText('pharmacy_product_description')->nullable();
            $table->longText('b_pharmacy_product_description')->nullable();
            $table->string('pharmacy_product_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->Integer('pharmacy_id')->unsigned();
            $table->Integer('product_category_id')->unsigned();
            $table->Integer('product_subcategory_id')->unsigned();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_subcategory_id')->references('id')->on('product_subcategory')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_product');
    }
}
