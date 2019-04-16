<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinePointTable extends Migration
{
    public function up()
    {
        Schema::create('vaccine_point', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vaccine_point_name')->nullable();
            $table->string('b_vaccine_point_name')->nullable();
            $table->string('vaccine_point_subname')->nullable();
            $table->string('b_vaccine_point_subname')->nullable();
            $table->string('vaccine_point_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('vaccine_point_description')->nullable();
            $table->longText('b_vaccine_point_description')->nullable();
            $table->string('vaccine_point_fb_link')->nullable();
            $table->string('vaccine_point_web_link')->nullable();
            $table->string('vaccine_point_total_bed')->nullable();
            $table->string('b_vaccine_point_total_bed')->nullable();
            $table->string('vaccine_point_total_doctor')->nullable();
            $table->string('b_vaccine_point_total_doctor')->nullable();
            $table->string('vaccine_point_total_staff')->nullable();
            $table->string('b_vaccine_point_total_staff')->nullable();
            $table->string('vaccine_point_address')->nullable();
            $table->string('b_vaccine_point_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('vaccine_point');
    }
}
