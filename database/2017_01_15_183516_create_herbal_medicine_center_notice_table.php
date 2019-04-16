<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalMedicineCenterNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('harbal_center_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('harbal_center_notice_title')->nullable();
            $table->string('b_harbal_center_notice_title')->nullable();
            $table->longText('harbal_center_notice_description')->nullable();
            $table->longText('b_harbal_center_notice_description')->nullable();
            $table->Integer('harbal_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('harbal_center_id')->references('id')->on('harbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('harbal_center_notice');
    }
}
