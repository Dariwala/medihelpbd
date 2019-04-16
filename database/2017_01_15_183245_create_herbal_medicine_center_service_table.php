<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalMedicineCenterServiceTable extends Migration
{
    public function up()
    {
        Schema::create('harbal_center_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('harbal_center_service_title')->nullable();
            $table->string('b_harbal_center_service_title')->nullable();
            $table->longText('harbal_center_service_description')->nullable();
            $table->longText('b_harbal_center_service_description')->nullable();
            $table->Integer('harbal_center_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('harbal_center_id')->references('id')->on('harbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('harbal_center_service');
    }
}
