<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pharmacy_name')->nullable();
            $table->string('b_pharmacy_name')->nullable();
            $table->string('pharmacy_subname')->nullable();
            $table->string('b_pharmacy_subname')->nullable();
            $table->longText('pharmacy_description')->nullable();
            $table->longText('b_pharmacy_description')->nullable();
            $table->string('pharmacy_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('pharmacy_fb_link')->nullable();
            $table->string('pharmacy_web_link')->nullable();
            $table->string('total_medicine')->nullable();
            $table->string('b_total_medicine')->nullable();
            $table->string('pharmacy_address')->nullable();
            $table->string('b_pharmacy_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy');
    }
}
