<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('pharmacy_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('pharmacy_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('pharmacy_doctor');
    }
}
