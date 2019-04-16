<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirAmbulancePhoneTable extends Migration
{
    public function up()
    {
        Schema::create('air_ambulance_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('air_ambulance_phone_no')->nullable();
            $table->Integer('air_ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('air_ambulance_id')->references('id')->on('air_ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('air_ambulance_phone');
    }
}
