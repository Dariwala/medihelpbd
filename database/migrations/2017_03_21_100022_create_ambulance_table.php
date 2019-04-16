<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbulanceTable extends Migration
{
    public function up()
    {
        Schema::create('ambulance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ambulance_name')->nullable();
            $table->string('b_ambulance_name')->nullable();
            $table->string('ambulance_subname')->nullable();
            $table->string('b_ambulance_subname')->nullable();
            $table->string('ambulance_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('ambulance_description')->nullable();
            $table->longText('b_ambulance_description')->nullable();
            $table->string('ambulance_fb_link')->nullable();
            $table->string('ambulance_web_link')->nullable();
            $table->string('total_ambulance')->nullable();
            $table->string('b_total_ambulance')->nullable();
            $table->string('ambulance_address')->nullable();
            $table->string('b_ambulance_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('ambulance');
    }
}
