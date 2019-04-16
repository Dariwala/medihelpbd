<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodDonorTable extends Migration
{
    public function up()
    {
        Schema::create('blood_donor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_donor_name')->nullable();
            $table->string('b_blood_donor_name')->nullable();
            $table->string('blood_donor_subname')->nullable();
            $table->string('b_blood_donor_subname')->nullable();
            $table->string('blood_donor_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('blood_donor_gender')->nullable();
            $table->string('b_blood_donor_gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('b_blood_group')->nullable();
            $table->longText('blood_donor_description')->nullable();
            $table->longText('b_blood_donor_description')->nullable();
            $table->string('blood_donor_fb_link')->nullable();
            $table->string('blood_donor_web_link')->nullable();
            $table->string('blood_donor_address')->nullable();
            $table->string('b_blood_donor_address')->nullable();
            $table->string('last_donate_date')->nullable();
            $table->string('b_last_donate_date')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_donor');
    }
}
