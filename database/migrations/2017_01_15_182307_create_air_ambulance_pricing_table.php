<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirAmbulancePricingTable extends Migration
{
    
    public function up()
    {
        Schema::create('air_ambulance_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name')->nullable();
            $table->string('b_package_name')->nullable();
            $table->longText('package_details')->nullable();
            $table->longText('b_package_details')->nullable();
            $table->Integer('air_ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('air_ambulance_id')->references('id')->on('air_ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

        public function down()
    {
        Schema::dropIfExists('air_ambulance_pricing');
    }
}
