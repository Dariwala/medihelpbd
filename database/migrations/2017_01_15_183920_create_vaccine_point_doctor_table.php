<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinePointDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('vaccine_point_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('vaccine_point_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('vaccine_point_id')->references('id')->on('vaccine_point')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('vaccine_point_doctor');
    }
}
