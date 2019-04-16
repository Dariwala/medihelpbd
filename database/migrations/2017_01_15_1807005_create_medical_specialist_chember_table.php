<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalSpecialistChemberTable extends Migration
{
   public function up()
    {
        Schema::create('medical_specialist_chember', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medical_specialist_chember_name')->nullable();
            $table->string('b_medical_specialist_chember_name')->nullable();
            $table->longText('medical_specialist_chember_description')->nullable();
            $table->longText('b_medical_specialist_chember_description')->nullable();
            $table->Integer('medical_specilaist_id')->unsigned();
            $table->timestamps();
            $table->foreign('medical_specilaist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('medical_specialist_chember');
    }
}
