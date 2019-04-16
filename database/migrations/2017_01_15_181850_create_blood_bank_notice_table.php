<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodBankNoticeTable extends Migration
{
    public function up()
    {
        Schema::create('blood_bank_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('b_date')->nullable();
            $table->string('blood_bank_notice_title')->nullable();
            $table->string('b_blood_bank_notice_title')->nullable();
            $table->longText('blood_bank_notice_description')->nullable();
            $table->longText('b_blood_bank_notice_description')->nullable();
            $table->Integer('blood_bank_id')->unsigned();
            $table->timestamps();
            $table->foreign('blood_bank_id')->references('id')->on('blood_bank')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_bank_notice');
    }
}
