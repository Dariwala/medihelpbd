<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center', function (Blueprint $table) {
            $table->increments('id');
            $table->string('herbal_center_name')->nullable();
            $table->string('b_herbal_center_name')->nullable();
            $table->string('herbal_center_subname')->nullable();
            $table->string('b_herbal_center_subname')->nullable();
            $table->string('herbal_center_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('herbal_center_description')->nullable();
            $table->longText('b_herbal_center_description')->nullable();
            $table->string('herbal_center_fb_link')->nullable();
            $table->string('herbal_center_web_link')->nullable();
            $table->string('herbal_center_total_bed')->nullable();
            $table->string('b_herbal_center_total_bed')->nullable();
            $table->string('herbal_center_total_doctor')->nullable();
            $table->string('b_herbal_center_total_doctor')->nullable();
            $table->string('herbal_center_total_staff')->nullable();
            $table->string('b_herbal_center_total_staff')->nullable();
            $table->string('herbal_center_address')->nullable();
            $table->string('b_herbal_center_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('herbal_center');
    }
}

