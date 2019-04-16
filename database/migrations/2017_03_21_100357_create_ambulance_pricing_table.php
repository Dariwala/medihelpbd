<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbulancePricingTable extends Migration
{
    
    public function up()
    {
        Schema::create('ambulance_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name')->nullable();
            $table->string('b_package_name')->nullable();
            $table->longText('package_details')->nullable();
            $table->longText('b_package_details')->nullable();
            $table->Integer('ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('ambulance_id')->references('id')->on('ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

        public function down()
    {
        Schema::dropIfExists('ambulance_pricing');
    }
}
