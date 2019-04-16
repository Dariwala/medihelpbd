<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalSeviceTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hospital_service_title')->nullable();
            $table->string('b_hospital_service_title')->nullable();
            $table->longText('hospital_service_description')->nullable();
            $table->longText('b_hospital_service_description')->nullable();
            $table->Integer('hospital_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('hospital_service');
    }
}
