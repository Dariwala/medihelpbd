<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hospital_name')->nullable();
            $table->string('b_hospital_name')->nullable();
            $table->string('hospital_subname')->nullable();
            $table->string('b_hospital_subname')->nullable();
            $table->string('hospital_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('hospital_description')->nullable();
            $table->longText('b_hospital_description')->nullable();
            $table->string('hospital_fb_link')->nullable();
            $table->string('hospital_web_link')->nullable();
            $table->string('hospital_total_bed')->nullable();
            $table->string('b_hospital_total_bed')->nullable();
            $table->string('hospital_total_doctor')->nullable();
            $table->string('b_hospital_total_doctor')->nullable();
            $table->string('hospital_total_staff')->nullable();
            $table->string('b_hospital_total_staff')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('b_hospital_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('hospital');
    }
}
