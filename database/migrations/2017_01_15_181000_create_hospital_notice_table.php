<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('hospital_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('hospital_notice_title')->nullable();
            $table->string('b_hospital_notice_title')->nullable();
            $table->longText('hospital_notice_description')->nullable();
            $table->longText('b_hospital_notice_description')->nullable();
            $table->Integer('hospital_id')->unsigned();
            $table->timestamps();
            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('hospital_notice');
    }
}
