<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinePointNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('vaccine_point_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('vaccine_point_notice_title')->nullable();
            $table->string('b_vaccine_point_notice_title')->nullable();
            $table->longText('vaccine_point_notice_description')->nullable();
            $table->longText('b_vaccine_point_notice_description')->nullable();
            $table->Integer('vaccine_point_id')->unsigned();
            $table->timestamps();
            $table->foreign('vaccine_point_id')->references('id')->on('vaccine_point')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('vaccine_point_notice');
    }
}
