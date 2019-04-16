<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbulanceNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('ambulance_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('ambulance_notice_title')->nullable();
            $table->string('b_ambulance_notice_title')->nullable();
            $table->longText('ambulance_notice_description')->nullable();
            $table->longText('b_ambulance_notice_description')->nullable();
            $table->Integer('ambulance_id')->unsigned();
            $table->timestamps();
            $table->foreign('ambulance_id')->references('id')->on('ambulance')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('ambulance_notice');
    }
}
