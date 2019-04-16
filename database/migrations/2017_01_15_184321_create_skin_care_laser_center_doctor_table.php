<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinCareLaserCenterDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('skin_laser_center_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('skin_laser_center_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('skin_laser_center_id')->references('id')->on('skin_laser_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('skin_laser_center_doctor');
    }
}
