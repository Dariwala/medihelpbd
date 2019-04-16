<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalSpecialistChamberTable extends Migration
{
   public function up()
    {
        Schema::create('medical_specialist_chamber', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medical_specialist_chamber_name')->nullable();
            $table->string('b_medical_specialist_chamber_name')->nullable();
            $table->longText('medical_specialist_chamber_description')->nullable();
            $table->longText('b_medical_specialist_chamber_description')->nullable();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('medical_specialist_chamber');
    }
}

