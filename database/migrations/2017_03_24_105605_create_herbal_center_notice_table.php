<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalCenterNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('herbal_center_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('herbal_center_notice_title')->nullable();
            $table->string('b_herbal_center_notice_title')->nullable();
            $table->longText('herbal_center_notice_description')->nullable();
            $table->longText('b_herbal_center_notice_description')->nullable();
            $table->Integer('herbal_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('herbal_center_id')->references('id')->on('herbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('herbal_center_notice');
    }
}
