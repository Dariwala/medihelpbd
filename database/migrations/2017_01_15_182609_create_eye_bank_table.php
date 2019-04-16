<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyeBankTable extends Migration
{
    public function up()
    {
        Schema::create('eye_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eye_bank_name')->nullable();
            $table->string('b_eye_bank_name')->nullable();
            $table->string('eye_bank_subname')->nullable();
            $table->string('b_eye_bank_subname')->nullable();
            $table->string('eye_bank_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('eye_bank_description')->nullable();
            $table->longText('b_eye_bank_description')->nullable();
            $table->longText('eye_group_details')->nullable();
            $table->longText('b_eye_group_details')->nullable();
            $table->string('eye_bank_fb_link')->nullable();
            $table->string('eye_bank_web_link')->nullable();
            $table->string('total_eye')->nullable();
            $table->string('b_total_eye')->nullable();
            $table->string('eye_bank_address')->nullable();
            $table->string('b_eye_bank_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('eye_bank');
    }

}
