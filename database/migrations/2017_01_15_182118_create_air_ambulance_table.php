<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirAmbulanceTable extends Migration
{
    public function up()
    {
        Schema::create('air_ambulance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('air_ambulance_name')->nullable();
            $table->string('b_air_ambulance_name')->nullable();
            $table->string('air_ambulance_subname')->nullable();
            $table->string('b_air_ambulance_subname')->nullable();
            $table->string('air_ambulance_photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->longText('air_ambulance_description')->nullable();
            $table->longText('b_air_ambulance_description')->nullable();
            $table->string('air_ambulance_fb_link')->nullable();
            $table->string('air_ambulance_web_link')->nullable();
            $table->longText('total_air_ambulance')->nullable();
            $table->longText('b_total_air_ambulance')->nullable();
            $table->string('air_ambulance_address')->nullable();
            $table->string('b_air_ambulance_address')->nullable();
            $table->Integer('district_id')->unsigned();
            $table->Integer('subdistrict_id')->unsigned();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subdistrict_id')->references('id')->on('subdistrict')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('air_ambulance');
    }
}
