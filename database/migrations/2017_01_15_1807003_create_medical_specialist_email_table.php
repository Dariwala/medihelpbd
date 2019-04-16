<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalSpecialistEmailTable extends Migration
{
    public function up()
    {
        Schema::create('medical_specialist_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medical_specialist_email_ad')->nullable();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('medical_specialist_email');
    }
}
