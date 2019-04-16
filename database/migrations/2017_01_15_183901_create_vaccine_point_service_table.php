<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinePointServiceTable extends Migration
{
    public function up()
    {
        Schema::create('vaccine_point_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vaccine_point_service_title')->nullable();
            $table->string('b_vaccine_point_service_title')->nullable();
            $table->longText('vaccine_point_service_description')->nullable();
            $table->longText('b_vaccine_point_service_description')->nullable();
            $table->Integer('vaccine_point_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('vaccine_point_id')->references('id')->on('vaccine_point')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('vaccine_point_service');
    }
}
