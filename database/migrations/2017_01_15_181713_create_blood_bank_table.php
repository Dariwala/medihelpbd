<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodBankTable extends Migration
{
    public function up()
    {
        Schema::create('blood_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_bank_name')->nullable();
            $table->string('b_blood_bank_name')->nullable();
            $table->string('blood_bank_subname')->nullable();
            $table->string('b_blood_bank_subname')->nullable();
            $table->string('blood_bank_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('blood_bank_description')->nullable();
            $table->longText('b_blood_bank_description')->nullable();
            $table->longText('blood_group_details')->nullable();
            $table->longText('b_blood_group_details')->nullable();
            $table->string('blood_bank_fb_link')->nullable();
            $table->string('blood_bank_web_link')->nullable();
            $table->string('total_blood_bag')->nullable();
            $table->string('b_total_blood_bag')->nullable();
            $table->string('blood_bank_address')->nullable();
            $table->string('b_blood_bank_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_bank');
    }
}
