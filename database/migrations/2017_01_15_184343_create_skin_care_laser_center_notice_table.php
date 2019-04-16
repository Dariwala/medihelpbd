<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinCareLaserCenterNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('skin_laser_center_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('skin_laser_center_notice_title')->nullable();
            $table->string('b_skin_laser_center_notice_title')->nullable();
            $table->longText('skin_laser_center_notice_description')->nullable();
            $table->longText('b_skin_laser_center_notice_description')->nullable();
            $table->Integer('skin_laser_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('skin_laser_center_id')->references('id')->on('skin_laser_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('skin_laser_center_notice');
    }
}
