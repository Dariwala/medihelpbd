<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinCareLaserCenterServiceTable extends Migration
{
    public function up()
    {
        Schema::create('skin_laser_center_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skin_laser_center_service_title')->nullable();
            $table->string('b_skin_laser_center_service_title')->nullable();
            $table->longText('skin_laser_center_service_description')->nullable();
            $table->longText('b_skin_laser_center_service_description')->nullable();
            $table->Integer('skin_laser_center_id')->unsigned();
            $table->Integer('service_id')->unsigned();
            $table->Integer('subservice_id')->unsigned();
            $table->timestamps();
            $table->foreign('skin_laser_center_id')->references('id')->on('skin_laser_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('subservice_id')->references('id')->on('subservice')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('skin_laser_center_service');
    }
}
