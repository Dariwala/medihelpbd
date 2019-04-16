<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyeBankNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('eye_bank_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('eye_bank_notice_title')->nullable();
            $table->string('b_eye_bank_notice_title')->nullable();
            $table->longText('eye_bank_notice_description')->nullable();
            $table->longText('b_eye_bank_notice_description')->nullable();
            $table->Integer('eye_bank_id')->unsigned();
            $table->timestamps();
            $table->foreign('eye_bank_id')->references('id')->on('eye_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('eye_bank_notice');
    }
}
