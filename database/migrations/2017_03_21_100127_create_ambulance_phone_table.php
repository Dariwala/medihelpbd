<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbulancePhoneTable extends Migration
{
    public function up()
    {
        Schema::create('ambulance_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ambulance_phone_no')->nullable();
            $table->Integer('ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('ambulance_id')->references('id')->on('ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('ambulance_phone');
    }
}
