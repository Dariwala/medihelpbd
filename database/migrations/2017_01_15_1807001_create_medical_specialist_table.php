<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalSpecialistTable extends Migration
{
    public function up()
    {
        Schema::create('medical_specialist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medical_specialist_name')->nullable();
            $table->string('b_medical_specialist_name')->nullable();
            $table->string('medical_specialist_subname')->nullable();
            $table->string('b_medical_specialist_subname')->nullable();
            $table->longText('medical_specialist_description')->nullable();
            $table->longText('b_medical_specialist_description')->nullable();
            $table->longText('medical_specialist_details')->nullable();
            $table->longText('b_medical_specialist_details')->nullable();
            $table->string('medical_specialist_fb_link')->nullable();
            $table->string('medical_specialist_web_link')->nullable();
            $table->string('medical_specialist_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('fee_new')->nullable();
            $table->string('b_fee_new')->nullable();
            $table->string('fee_old')->nullable();
            $table->string('b_fee_old')->nullable();
            $table->string('fee_report')->nullable();
            $table->string('b_fee_report')->nullable();
            $table->string('medical_specialist_address')->nullable();
            $table->string('b_medical_specialist_address')->nullable();
            $table->Integer('department_id')->unsigned()->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('medical_specialist');
    }
}
