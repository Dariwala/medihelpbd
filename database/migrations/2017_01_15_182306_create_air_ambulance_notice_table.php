<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirAmbulanceNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('air_ambulance_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('air_ambulance_notice_title')->nullable();
            $table->string('b_air_ambulance_notice_title')->nullable();
            $table->longText('air_ambulance_notice_description')->nullable();
            $table->longText('b_air_ambulance_notice_description')->nullable();
            $table->Integer('air_ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('air_ambulance_id')->references('id')->on('air_ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('air_ambulance_notice');
    }
}
