<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyeBankDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('eye_bank_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('eye_bank_id')->unsigned();
            $table->Integer('department_id')->unsigned();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('eye_bank_id')->references('id')->on('eye_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('eye_bank_doctor');
    }
}
