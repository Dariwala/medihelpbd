<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalSpecialistNoticeTable extends Migration
{
    
    public function up()
    {
        Schema::create('medical_specialist_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('medical_specialist_notice_title')->nullable();
            $table->string('b_medical_specialist_notice_title')->nullable();
            $table->longText('medical_specialist_notice_description')->nullable();
            $table->longText('b_medical_specialist_notice_description')->nullable();
            $table->Integer('medical_specialist_id')->unsigned();
            $table->timestamps();
            $table->foreign('medical_specialist_id')->references('id')->on('medical_specialist')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('medical_specialist_notice');
    }
}
