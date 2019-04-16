<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalMedicineCenterTable extends Migration
{
    public function up()
    {
        Schema::create('harbal_center', function (Blueprint $table) {
            $table->increments('id');
            $table->string('harbal_center_name')->nullable();
            $table->string('b_harbal_center_name')->nullable();
            $table->string('harbal_center_subname')->nullable();
            $table->string('b_harbal_center_subname')->nullable();
            $table->string('harbal_center_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('harbal_center_description')->nullable();
            $table->longText('b_harbal_center_description')->nullable();
            $table->string('harbal_center_fb_link')->nullable();
            $table->string('harbal_center_web_link')->nullable();
            $table->integer('harbal_center_total_bed')->nullable();
            $table->integer('b_harbal_center_total_bed')->nullable();
            $table->integer('harbal_center_total_doctor')->nullable();
            $table->integer('b_harbal_center_total_doctor')->nullable();
            $table->integer('harbal_center_total_staff')->nullable();
            $table->integer('b_harbal_center_total_staff')->nullable();
            $table->string('harbal_center_address')->nullable();
            $table->string('b_harbal_center_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('harbal_center');
    }
}
