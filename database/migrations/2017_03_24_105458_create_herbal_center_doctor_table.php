<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('herbal_center_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('herbal_center_id')->references('id')->on('herbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('herbal_center_doctor');
    }
}
